<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'order_id',
        'metode_pembayaran',
        'jumlah',
        'status',
        'tanggal_pembayaran'
    ];

    // Relasi: satu pembayaran milik satu pesanan
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}