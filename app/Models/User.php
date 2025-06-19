<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
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
