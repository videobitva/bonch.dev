<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Plate;
use Illuminate\Http\Request;
use DB;
use Session;
use function Psy\debug;

class CartController extends Controller
{
    /*public function add(Request $request)
    {
        $id = $request->only('id');
        foreach($id as $result) {
            echo $result.'<br>';
        }
        session()->token();
        /*try
        {
            $product = DB::selectOne('select * from plates where id = ?',[$id]);
            $session = $request->session()->get('id');
            $cart = new Cart();
            $cart->addToCart($product);

        }
        catch(\PDOException $exception)
        {
            return false;
        }


    }*/

    public function actionAdd(Request $request)
    {
        $id_plate = $request->get('id_plate');

        $template = array('id_plate' => null, 'count' => null);

        $count = count($request->session()->get('plates'));

        $counter = 0;

        $not_found = false;

        if ($request->session()->has('plates')){

            foreach ($request->session()->get('plates') as $arr){

                $currentID = $arr['id_plate'];
                $currentCount = $arr['count'];

                if ($currentID == $id_plate){
                    $route = 'plates.'.$counter.'.count';
                    $currentCount = $currentCount + 1;
                    $request->session()->put($route,$currentCount);
                    $not_found = false;
                }
                else{
                    $not_found = true;
                }
                $counter = $counter + 1;
            }

            if ($not_found){
                $template['id_plate'] = $id_plate;
                $template['count'] = 1;
                $request->session()->push('plates', $template);
            }
        }
        else{
            $template['id_plate'] = $id_plate;
            $template['count'] = 1;
            $request->session()->push('plates', $template);
        }
        $response = $request->session()->get('plates');
        return response()->json($response);
    }

    public function actionDelete($id)
    {
        // Удалить товар из корзины
        // Возвращаем пользователя на страницу
        header("Location: /cart/");
    }

    public function actionIndex()
    {
        /*$categories = array();
        $categories = Category::getCategoriesList();

        $productsInCart = false;*/

        // Получим данные из корзины
        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            // Получаем полную информацию о товарах для списка
            $productsIds = array_keys($productsInCart);
            $products = Plate::getProdustsByIds($productsIds);

            // Получаем общую стоимость товаров
            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once(ROOT . '/views/cart/index.php');

        return true;
    }



    public function view(){
        return view('test');
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
