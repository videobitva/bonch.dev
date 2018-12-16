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

    protected $table = 'order';

    protected $fillable = ['id_user','id_country','address','index','phone_number','id_plate','total'];
    public $timestamps = false;
}
