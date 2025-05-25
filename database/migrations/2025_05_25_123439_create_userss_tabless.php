<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       // Tabel users One to Many dengan Tabel orders
    Schema::create('userss', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->enum('role', ['admin', 'chef', 'customer']);// admin, chef, customer
        $table->timestamps();
    });
    }
    public function down(): void
    {
        Schema::dropIfExists('userss');
    }
    
};
