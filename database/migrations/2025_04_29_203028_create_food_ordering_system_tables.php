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

      // Tabel: payments (One-to-One dengan orders)
      Schema::create('payments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // One-to-One: orders -> payments
        $table->string('metode_pembayaran'); 
        $table->decimal('jumlah', 10, 2);
        $table->enum('status', ['menunggu', 'dibayar', 'gagal']); 
        $table->timestamp('tanggal_pembayaran')->nullable();
        $table->timestamps();
    });

    // Tabel: feedback (Many-to-One dengan users & menus, Optional dengan orders)
    Schema::create('feedback', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Many-to-One: users -> feedback
        $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade'); // Many-to-One: menus -> feedback
        $table->foreignId('order_id')->nullable()->constrained('orders')->onDelete('set null'); // Optional One-to-Many
        $table->tinyInteger('penilaian'); // rating 1-5
        $table->text('komentar')->nullable(); 
        $table->timestamps();
    });

    // Tabel: deliveries (One-to-One dengan orders)
    Schema::create('deliveries', function (Blueprint $table) {
        $table->id();
        $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // One-to-One: orders -> deliveries
        $table->enum('status_pengiriman', ['diproses', 'dikirim', 'diterima']); 
        $table->timestamp('waktu_pengiriman')->nullable(); 
        $table->text('alamat'); 
        $table->string('kurir')->nullable(); 
        $table->string('kode_pelacakan')->nullable(); 
        $table->timestamps();
    });

}

    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('userss');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('feedback');
        Schema::dropIfExists('deliveries');
    }

};
