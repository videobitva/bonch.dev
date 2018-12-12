<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    public function plate()
    {
        return $this->hasMany('App\Plate');
    }
}