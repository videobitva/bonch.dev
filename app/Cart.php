<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Cart extends Model
{
    /**
     * Подсчет количество товаров в корзине (в сессии)
     * @return int
     */

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

