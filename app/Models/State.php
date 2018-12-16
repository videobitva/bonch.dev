<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'state';

    public function plate()
    {
        return $this->hasMany('Plate::class');
    }
}
