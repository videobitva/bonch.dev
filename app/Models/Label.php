<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Label
 * @package App\Label
 * @property string name;
 */

class Label extends Model
{
    protected $table = 'labels';

    public function plate()
    {
        return $this->hasMany('Plate::class');
    }
    protected $table = 'label';
}
