<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'menu_id',
        'jumlah',
        'status',
    ];
    public function menus(){
        return $this->belongsTo(Menu::class);
    }

    public function userss(){
        return $this->belongsTo(User::class);
    }
}