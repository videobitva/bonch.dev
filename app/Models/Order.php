<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function plate()
    {
        return $this->hasMany('App\Plate');
    }

    public function user()
    {
        return $this->belongsTo('App\User');

    }
}
