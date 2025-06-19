<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Menu;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'menu_id',
        'jumlah',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'order_id');
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }

    public function feedback()
    {
        return $this->hasOne(Feedback::class);
    }
}
