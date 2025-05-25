<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
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
    }
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
