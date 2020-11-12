<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['admin_since'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    // Relaciones a través de relaciones
    public function payments()
    {
        return $this->hasManyThrough(Payment::class, Order::class, 'customer_id');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function isAdmin()
    {
        return $this->admin_since != null
            && $this->admin_since->lessThanOrEqualTo(now());
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getProfileImageAttribute()
    {
        return $this->image
            ? "images/{$this->image->path}"
            : 'https://www.gravatar.com/avatar/404?d=mp';
    }
}
