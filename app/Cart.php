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
    protected $id_plate = array();
    protected $count = array();
    protected $debug = array();
    protected $attributes = [];

    public function plate(){
        return $this->hasMany('App\Plate');
    }

    public function addNew($id_plate){
        $this->id_plate[] = $id_plate;
        $this->count[] = 1;
        $this->debug[] = 'addNew ID = '.$id_plate;
        $this->commit();
    }

    public function addOld($id_plate){
        $this->count[$this->target($id_plate)] += 1;
        $this->debug[] = 'addOld ID = '.$id_plate;
        $this->commit();
    }

    public function newCart($id_plate){
        $this->id_plate[] = $id_plate;
        $this->count[] = 1;
        $this->debug[] = 'newCart ID = '.$id_plate;
        $this->commit();
    }

    public function check($id_plate){
        return (in_array($id_plate, $this->id_plate));
    }

    public function remove($id_plate){
        unset($this->id_plate[$this->target($id_plate)]);
        unset($this->count[$this->target($id_plate)]);
        sort($this->id_plate);
        sort($this->id_plate);
        $this->commit();
    }

    public function target($id_plate){
        return (array_search($id_plate, $this->attributes['id_plate']));
    }

    public function commit(){
        $this->attributes['id_plate'] = $this->id_plate;
        $this->attributes['count'] = $this->count;
        $this->attributes['debug'] = $this->debug;
    }
}

