<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{

    public function plate()
    {
        return $this->hasMany('Plate::class');
    }
    protected $table = 'singer';
}
