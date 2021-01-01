<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public function role()
    {
        return $this->hasOne(Role::class);
    }

    public function tier()
    {
        return $this->hasOne(Tier::class);
    }

    public function subscription()
    {
        return $this->hasMany(Subscription::class);
    }

    public function recipe()
    {
        return $this->hasMany(Recipe::class, 'author_id');
    }

    public function review()
    {
        return $this->belongsTo(Review::class);
    }
    public function favoritedRecipe()
    {
        return $this->belongsTo(FavoritedRecipe::class);
    }
    public function following()
    {
        return $this->belongsTo(Following::class);
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
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
}
