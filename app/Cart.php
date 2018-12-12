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
        array_push($this->fillable['id_plate'],$id_plate);
        array_push($this->fillable['count'],1);
    }

    public function addOld($id_plate){
        $this->fillable['count'][$this->target($id_plate)] += 1;
    }

    public function newCart($id_plate){
        $this->fillable['id_plate'] = $id_plate;
        $this->fillable['count'] = 1;
    }
    public function check($id_plate){
        return(in_array($id_plate, $this->fillable[$id_plate]));
    }
    public function remove($id_plate){
        unset($this->fillable['id_plate'][$this->target($id_plate)]);
        unset($this->fillable['count'][$this->target($id_plate)]);
        sort($this->fillable['id_plate']);
        sort($this->fillable['count']);
    }
    public function target($id_plate){
        return (array_search($id_plate, $this->fillable['id_plate']));
    }
}

