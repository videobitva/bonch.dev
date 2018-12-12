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
    protected $fillable = ['id_plate', 'count'];

    public function plate(){
        return $this->hasMany('App\Plate');
    }

    public function addNew($id_plate){
        array_pull($this->id_plate, $id_plate);
        array_pull($this->count, 1);
    }
    public function addOld($id_plate){
        array_pull($this->count[$this->target($id_plate)], $this->count[$this->target($id_plate)] + 1);
    }
    public function check($id_plate){
        return(in_array($id_plate, $this->id_plate));
    }
    public function remove($id_plate){
        unset($this->id_plate[$this->target($id_plate)]);
        unset($this->count[$this->target($id_plate)]);
        array_values($this->id_plate);
        array_values($this->count);
    }
    public function target($id_plate){
        $index = null;
        foreach ($this->id_plate as $arr){
            $index += 1;
            if ($arr == $id_plate){
                return ($index-1);
            }
        }
    }
}

