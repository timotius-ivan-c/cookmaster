<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public function role()
    {
        return $this->belongsTo(Role::class, "role_id", "id");
    }

    public function tier()
    {
        return $this->hasOne(Tier::class);
    }

    public function subscription()
    {
        return $this->hasMany(Subscription::class, 'member_id');
    }

    public function recipe()
    {
        return $this->hasMany(Recipe::class, 'author_id');
    }

    public function paid_recipe()
    {
        return $this->hasMany(Recipe::class, 'author_id')->where('recipe_type', 2);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }
    public function favoritedRecipe()
    {
        return $this->belongsTo(FavoritedRecipe::class);
    }
    // public function following()
    // {
    //     return $this->hasMany(Following::class, 'member_id');
    // }

    // A working User-to-User relationship for following and followers relation
    // using intermediate table 'followings'
    public function following() {
        return $this->belongsToMany(User::class, 'followings', 'member_id', 'chef_id');
    }
    public function followers() {
        return $this->belongsToMany(User::class, 'followings', 'chef_id', 'member_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
    public function following_list()
    {
        return $this->hasMany(Followings::class, 'chef_id');
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
