<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

    public function plate()
    {
        return $this->hasMany('Plate::class');
    }
    protected $table = 'state';
}
