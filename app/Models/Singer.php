<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    protected $table = 'singer';

    public function plate()
    {
        return $this->hasMany('Plate::class');
    }
}
