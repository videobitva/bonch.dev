<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function plate()
    {
        return $this->hasMany('Plate::class');
    }

    public function user()
    {
        return $this->belongsTo('App\User');

    }
}
