<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Plate
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Plate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Plate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Plate query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property int $id_singer
 * @property int $id_genre
 * @property int $year
 * @property int $id_country
 * @property int $id_state
 * @property float $price
 * @property int $count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Plate whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Plate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Plate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Plate whereIdCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Plate whereIdGenre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Plate whereIdSinger($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Plate whereIdState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Plate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Plate wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Plate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Plate whereYear($value)
 */
class Plate extends Model
{
    /**
     * Plate constructor.
     * @param array $attributes
     */


    public function genre(){
        return $this->belongsTo('App\Models\Genre');
    }

    public function label(){
        return $this->belongsTo('App\Models\Label');
    }

    public function order(){
        return $this->belongsTo('Order::class');
    }

    public function singer(){
        return $this->belongsTo('App\Models\Singer');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State');

    }

        public function country(){
            return $this->belongsTo('App\Models\Country');
        }

    protected $table = 'plates';
    public $timestamps = false;
}
