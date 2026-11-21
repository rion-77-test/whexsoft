<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chat_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('session_token', 64)->unique();
            $table->string('visitor_name');
            $table->string('visitor_phone', 30);
            $table->string('status', 20)->default('active');
            $table->timestamp('last_active_at')->nullable();
            $table->timestamps();

            $table->index(['visitor_phone', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chat_sessions');
    }
};