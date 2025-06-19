<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('feedback', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
        $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade');
        $table->foreignId('order_id')->nullable()->constrained('orders')->onDelete('set null');
        $table->integer('rating')->nullable(); // rating 1-5
        $table->text('komentar')->nullable(); 
        $table->timestamps();
    });
    }
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
