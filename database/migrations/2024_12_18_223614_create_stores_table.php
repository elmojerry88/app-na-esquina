<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->uuid('store_id')->unique();
            $table->foreignUuid('user_id')->references('user_id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('adress_id')->references('adress_id')->on('adress')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('store_namee')->unique();
            $table->string('email_info')->unique();
            $table->string('nif')->unique();
            $table->string('logo_url');
            $table->enum('status', ['pending','verified', 'banned'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
