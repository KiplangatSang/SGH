<?php

namespace App\Articles;

use App\Posts\Posts;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $guarded = [];

    public function categoryable()
    {
        # code...
        return $this->morphTo();
    }

    public function posts()
    {
        # code...
        return $this->hasMany(Posts::class,'post_category');
    }
}
