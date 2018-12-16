<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    public function plate()
    {
        return $this->hasMany('App\Plate');
    }
    protected $table = 'label';
}
