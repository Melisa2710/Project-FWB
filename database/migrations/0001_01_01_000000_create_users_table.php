<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       // Tabel users One to Many dengan Tabel orders
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->rememberToken();
        $table->enum('role', ['admin', 'chef', 'customer']);// admin, chef, customer
        $table->timestamps();
    });
  

    }

        public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
