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
        Schema::create('adress', function (Blueprint $table) {
            $table->id('adress_id');
            $table->foreignUuid('user_id')->references('user_id')->on('users')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->enum('type', ['shipping','billing', 'store']);
            $table->string('adress_line1');
            $table->string('adress_line2');
            $table->string('city');
            $table->string('state');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adresses');
    }
};
