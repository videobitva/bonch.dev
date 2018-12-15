<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Plate;


/**
 * Class Cart
 * @package App
 */
class Cart extends Model
{
    protected $attributes = ['cart' => array()];

    public function plate(){
        return $this->hasMany('App\Plate');
    }

    public function addNew($idPlate){
        $product = new Product($idPlate,1,'addNew');
        $this->attributes['cart'][] = $product;
        return $this;
    }

    public function addOld($idPlate){
        $product = $this->attributes['cart'][$this->scan($idPlate)];
        $product->count += 1;
        $product->debug = 'addOld';
        $this->attributes['cart'][$this->scan($idPlate)] = $product;
        return $this;
    }

    public function scan($idPlate){
        $id = 0;
        foreach ($this->attributes['cart'] as $arr){
            if ($arr->id_plate == $idPlate){
                return $id;
            }
            $id += 1;
        }
        return null;
    }

    public function check($idPlate){
        foreach ($this->attributes['cart'] as $arr){
            if ($arr->id_plate == $idPlate){
                return true;
            }
        }
        return false;
    }
}

class Product
{
    public function __construct($id_plate, $count = 1, $debug)
    {
        $this->id_plate = $id_plate;
        $this->count = $count;
        $this->debug = $debug;
    }
}

