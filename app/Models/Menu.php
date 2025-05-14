<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'gambar',
        'user_id' // Jika chef yang menambahkan menu
    ];

    // Menu bisa punya banyak pesanan
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Menu bisa punya banyak feedback
    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    // Jika chef bertanggung jawab atas menu
    public function chef()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}