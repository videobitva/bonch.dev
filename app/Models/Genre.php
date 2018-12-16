<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Genre extends Model
{
    protected $table = 'genre';

    public function plate()
    {
        return $this->hasMany('Plate::class');
    }
    protected $table = 'genre';
}
