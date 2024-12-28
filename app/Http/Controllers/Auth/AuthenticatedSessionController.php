<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        #Autentica o usuário
        $request->authenticate();

        #gera a sessão do usuário
        return $request->session()->regenerate();

        #redireciona para o dashboard
        // return redirect()->intended(route('dashboard', absolute: false));

        
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        #destrói a sessão do usuário
        Auth::guard('web')->logout();

        #invalida a sessão 
        $request->session()->invalidate();

        #regenera o token
        $request->session()->regenerateToken();

        #redireciona para o "home"
        return redirect('/');
    }
}
