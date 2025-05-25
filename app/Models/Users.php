<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'userss';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'role' // admin, chef, customer
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // RELASI

    // User (customer) bisa punya banyak order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // User bisa memberi banyak feedback
    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    // User (chef) bisa membuat banyak menu (jika sistem mendukung ini)
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    // Optional: jika ada notifikasi
    public function routeNotificationForMail()
    {
        return $this->email;
    }
}