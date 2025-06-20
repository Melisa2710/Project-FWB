<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel menus One to Many dengan Tabel orders
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_makanan');
            $table->integer('harga');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
