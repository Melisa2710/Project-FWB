<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       // Tabel orders Many to One dengan Tabel userss dan Many to One dengan Tabel menus
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('userss')->onDelete('cascade');
        $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade');
        $table->integer('jumlah');
        $table->string('status')->default('pending');
        $table->timestamps();
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
