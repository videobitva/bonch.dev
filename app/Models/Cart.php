<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

use App\Plate;
/**
 * Class Cart
 * @package App
 */
class Cart extends Model
{
    public $cart = array('sum' => null);

    public function add($id_plate){
        // $plate = new Plate();

        $product = array_key_exists($id_plate,$this->cart) ? $this->cart[$id_plate] : new product([

            'plate' => Plate::where('id', $id_plate)->get(),
            'count' => 0,
            ]);
        $product->put('count',$product->get('count') + 1);
        //dd(json_decode($product['plate'],true));
        $this->cart['sum'] += json_decode($product['plate'],true)[0]['price'];
        $this->cart[$id_plate] = $product;
        return $this;
    }

    public function remove($id_plate){
        $this->cart['sum'] -= $this->cart[$id_plate]['count'] * json_decode($this->cart[$id_plate]['plate'],true)[0]['price'];
        unset($this->cart[$id_plate]);
        return $this;
    }
}

class product extends Collection
{

}
