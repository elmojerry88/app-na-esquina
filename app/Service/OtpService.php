<?php 

namespace App\Service;

use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class OtpService

{
    protected int $maxAttempts = 3; // Máximo de solicitações permitidas
    protected int $cooldown = 60; // Em segundos (exemplo: 1 minuto de espera após limite)

    public function __construct(){

    }

    public function generateOtp($userId): string
    {
        $otp = str_pad(random_int(100000, 999999), 6, '0', STR_PAD_LEFT); // Código de 6 dígitos

        $expiresAt = Carbon::now()->addMinutes(5); // Define a validade do código OTP

        // Salvar o OTP no banco (ou cache)
        Cache::put("otp_{$userId}", $otp, $expiresAt);

        Log::info("OTP gerado", [
            'user_id' => $userId,
            'otp' => $otp, // Remova para produção se quiser esconder os códigos gerados
            'expires_at' => $expiresAt
        ]);

        return $otp;
    }

    public function validateOtp($userId, $otp): bool
    {
        $attemptKey = "otp_attempts_{$userId}";

        $attempts = Cache::get($attemptKey, 0);

        if ($attempts >= $this->maxAttempts) {
            throw new \Exception("Limite de tentativas atingido. Solicite um novo OTP.");
        }

        $cachedOtp = Cache::get("otp_{$userId}");

        if ($cachedOtp && $cachedOtp === $otp) {
            Cache::forget($attemptKey);
            Cache::forget("otp_{$userId}");
            return true;
        }


        Log::warning("Falha na validação do OTP", [
            'user_id' => $userId,
            'otp' => $otp
        ]);

        Cache::put($attemptKey, $attempts + 1, 300); // Armazena o contador por 5 minutos
        
        return false;

    }

    public function canRequestOtp(string $phoneNumber): bool
    {
        $cacheKey = "otp_rate_limit_{$phoneNumber}";
        $data = Cache::get($cacheKey, ['attempts' => 0, 'blocked_until' => null]);

        // Verificar se o usuário está bloqueado
        if ($data['blocked_until'] && Carbon::now()->lt($data['blocked_until'])) {
            return false;
        }

        return true;
    }

    public function recordOtpRequest(string $phoneNumber): void
    {
        $cacheKey = "otp_rate_limit_{$phoneNumber}";
        $data = Cache::get($cacheKey, ['attempts' => 0, 'blocked_until' => null]);

        $data['attempts'] += 1;

        if ($data['attempts'] > $this->maxAttempts) {
            // Bloqueia o usuário por $cooldown segundos
            $data['blocked_until'] = Carbon::now()->addSeconds($this->cooldown);
            $data['attempts'] = 0; // Reinicia os contadores após o bloqueio
        }

        Cache::put($cacheKey, $data, $this->cooldown + 60); // Mantém o cache por mais tempo
    }

    public function timeUntilUnblocked(string $phoneNumber): ?int
    {
        $cacheKey = "otp_rate_limit_{$phoneNumber}";
        $data = Cache::get($cacheKey, ['blocked_until' => null]);

        if ($data['blocked_until']) {
            $seconds = Carbon::now()->diffInSeconds($data['blocked_until'], false);
            return $seconds > 0 ? $seconds : null;
        }

        return null;
    }
}