<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
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
    }
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
