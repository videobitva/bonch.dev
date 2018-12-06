<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /*public function addToCart($product, $qty = 1){
        echo 'Works... maybe';
    }*/

    public static function addProduct($id)
    {
        $id = intval($id);

        // Пустой массив для товаров в корзине
        $productsInCart = array();

        // Если в корзине уже есть товары (они хранятся в сессии)
        if (isset($_SESSION['plates'])) {
            // То заполним наш массив товарами
            $productsInCart = $_SESSION['plates'];
        }

        // Если товар есть в корзине, но был добавлен еще раз, увеличим количество
        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id] ++;
        } else {
            // Добавляем нового товара в корзину
            $productsInCart[$id] = 1;
        }

        $_SESSION['plates'] = $productsInCart;

        return self::countItems();
    }

    /**
     * Подсчет количество товаров в корзине (в сессии)
     * @return int
     */
    public static function countItems()
    {
        if (isset($_SESSION['plates'])) {
            $count = 0;
            foreach ($_SESSION['plates'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
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

