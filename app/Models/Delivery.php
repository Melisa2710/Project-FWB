<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'deliveries';

    protected $fillable = [
        'order_id',
        'status_pengiriman',
        'waktu_pengiriman',
        'alamat',
        'kurir',
        'kode_resi'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}