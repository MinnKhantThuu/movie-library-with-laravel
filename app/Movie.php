<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    function mt(){
        return $this->hasOne('\App\Category','id','movie_type');
    }

    function actor(){
        return $this->hasOne('\App\Category','id','cast');
    }
}
