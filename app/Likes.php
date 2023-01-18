<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    //

    protected $guarded =[];

    public function likeable()
    {
        return $this->morphTo();
        # code...
    }
}
