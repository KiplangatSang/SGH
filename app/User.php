<?php

namespace App;

use App\Articles\Categories;
use App\Posts\Posts;
use App\Posts\PostsImages;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'month',
        'year', 'remember_token','api_token',

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
    protected $dates = [
        'created_at',
        'updated_at',
        'performed_at'
    ];

    public function posts()
    {
        return $this->morphMany(Posts::class, 'postable');
    }

    public function category()
    {
        return $this->morphMany(Categories::class, 'categoryable');
    }
    public function postImages()
    {
        return $this->morphMany(PostsImages::class, 'postImageable');
    }
}
