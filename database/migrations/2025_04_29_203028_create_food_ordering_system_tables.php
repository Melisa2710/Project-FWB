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
        $table->string('role')->default('customer'); // admin, chef, customer
        $table->timestamps();
    });

    // Tabel menus One to Many dengan Tabel orders
    Schema::create('menus', function (Blueprint $table) {
        $table->id();
        $table->string('nama_makanan');
        $table->integer('harga');
        $table->timestamps();
    });

    // Tabel orders Many to One dengan Tabel userss dan Many to One dengan Tabel menus
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->string('user_id')->constrained('userss')->onDelete('cascade');
        $table->string('menu_id')->constrained('menus')->onDelete('cascade');
        $table->integer('jumlah');
        $table->string('status')->default('pending');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('userss');
    }

};
