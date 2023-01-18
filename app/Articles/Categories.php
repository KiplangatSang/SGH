<?php

namespace App\Articles;

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
}
