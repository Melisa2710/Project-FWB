<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Order;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';


    protected $fillable = [
        'nama_makanan',
        'harga',
    ];

    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

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
}
