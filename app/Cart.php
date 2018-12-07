<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Cart extends Model
{
    /*public function addToCart($product, $qty = 1){
        echo 'Works... maybe';
    }*/

   /* public static function addProduct($id_plate, $action)
    {
        $id_plate = intval($id_plate);

        // Пустой массив для товаров в корзине
        $productsInCart = array('id_plate' => null, 'count' => null);

        if ($action == 'addOld') {
            $productsInCart = session()->get('plates');
            $productsInCart['count']+=1;
            session()->put(['plates'=>'id_plate'], $productsInCart['id_plate']);
            session()->put(['plates'=>'count'], $productsInCart['count']);
        }
        elseif($action == 'addNew'){
            $productsInCart = session()->get('plates');
            $productsInCart['id_plate'] = $id_plate;
            $productsInCart['count'] = 1;
            session()->push(['plates']['id_plate'], $productsInCart['id_plate']);
            session()->push(['plates']['count'], $productsInCart['count']);
        }

        /*return self::countItems();
        $plates = session()->get('plates');
        return $plates;
    }
    */
    /**
     * Подсчет количество товаров в корзине (в сессии)
     * @return int
     */
    public static function countItems()
    {
        if (isset($_SESSION['plates'])) {
            $count = 0;/*
            foreach ($_SESSION['plates']['count'] as $value) {
                $count = $count + $value;
            }
            return $count;
*/
            return $_SESSION['plates']['count'];
        } else {
            return 0;
        }
    }

    public static function getProducts()
    {
        if (isset($_SESSION['plates'])) {
            return $_SESSION['plates'];
        }
        return false;
    }

    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();

        $total = 0;

        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }

        return $total;
    }

    public static function clear()
    {
        if (isset($_SESSION['plates'])) {
            unset($_SESSION['plates']);
        }
    }
}

