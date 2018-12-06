<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function addToCart($product, $qty = 1){
        echo 'Works... maybe';
    }
}
