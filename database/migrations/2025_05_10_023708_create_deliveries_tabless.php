<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
         // Tabel: deliveries (One-to-One dengan orders)
    Schema::create('deliveries', function (Blueprint $table) {
        $table->id();
        $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // One-to-One: orders -> deliveries
        $table->enum('status_pengiriman', ['diproses', 'dikirim', 'diterima']); 
        $table->timestamp('waktu_pengiriman')->nullable(); 
        $table->text('alamat'); 
        $table->string('kurir')->nullable(); 
        $table->string('kode_resi')->nullable(); 
        $table->timestamps();
    });

    }

    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
