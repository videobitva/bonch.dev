<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Plate;
use Illuminate\Http\Request;
use DB;
use Session;
use function Psy\debug;
use Auth;

class CartController extends Controller
{
    public function actionAdd(Request $request)
    {
        $id_plate = $request->get('id_plate');

        $template = array('id_plate' => null, 'count' => null);

        $counter = 0;

        $success = false;

        if ($request->session()->has('plates')){

            foreach ($request->session()->get('plates') as $arr){

                $currentID = $arr['id_plate'];
                $currentCount = $arr['count'];

                if ($id_plate == $currentID){
                    $route = 'plates.'.$counter.'.count';
                    $currentCount += 1;
                    $request->session()->put($route, $currentCount);
                    $success = true;
                }

                $counter += 1;
            }

            if ($success == false){
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

    public function actionDelete(Request $request)
    {
        // Удалить товар из корзины

        $id_plate = $request->get('id_plate');

        $count = 0;

        $success = false;

        foreach ($request->session()->get('plate') as $arr){
            if ($arr['id_plate'] == $id_plate){
                $request->session()->forget('plates.'.$count);
                $success = true;
            }
            $count += 1;
        }

        if ($success){
            return response()->json('ok');
        }
        else{
            return response()->json('error');
        }

    }

    public function actionIndex(Request $request)
    {
        $result = array(
            'products' => null,
            'total' => null
        );
        $product = array(
            'name' => null,
            'year_issue' => null,
            'year_publishing' => null,
            'singer' => null, //
            'genre' => null, //
            'label' => null, //
            'country' => null, //
            'state' => null, //
            'price' => null,
        );

        //Needs User's ID from /api/login; Needs to know if bonuses are used;

        $count = 0;
        $pre_total = 0;
        foreach ($request->session()->get('plates') as $arr){

            $product['name'] = DB::table('plates')
                ->select('name')
                ->where('id','=', $arr['id_plate'])
                ->get();

            $product['year_issue'] = DB::table('plates')
                ->select('year_issue')
                ->where('id','=', $arr['id_plate'])
                ->get();

            $product['year_publishing'] = DB::table('plates')
                ->select('year_publishing')
                ->where('id','=', $arr['id_plate'])
                ->get();

            $product['singer'] = DB::table('plates')
                ->join('singer','plates.id_singer','=','singer.id')
                ->select('singer.name')
                ->where('plates.id','=', $arr['id_plate'])
                ->get();

            $product['genre'] = DB::table('plates')
                ->join('genre','plates.id_genre','=','genre.id')
                ->select('genre.name')
                ->where('plates.id','=', $arr['id_plate'])
                ->get();

            $product['label'] = DB::table('plates')
                ->join('label','plates.id_label','=','label.id')
                ->select('label.name')
                ->where('plates.id','=', $arr['id_plate'])
                ->get();

            $product['country'] = DB::table('plates')
                ->join('countries','plates.id_country','=','countries.id')
                ->select('countries.name')
                ->where('plates.id','=', $arr['id_plate'])
                ->get();

            $product['state'] = DB::table('plates')
                ->join('state','plates.id_state','=','state.id')
                ->select('state.name')
                ->where('plate.id','=', $arr['id_plate'])
                ->get();

            $product['price'] = DB::table('plates')
                ->select('price')
                ->where('id', '=', $arr['id_plate'])
                ->get();

            array_push($result['products'], $product);

            $pre_total = $pre_total + $product['price'];
            $count += 1;
        }

        if (Auth::check()){
            $bonus = DB::table('users')->select('bonus')->where('id', Auth::id()/*$request->get('id')*/)->get();
            $use_bonus = $request->get('use_bonus', false);
            if($use_bonus){
                $result['total'] = $pre_total - $bonus;
            }
            else{
                $result['total'] = $pre_total;
            }
        }
        else{
            $result['total'] = $pre_total;
        }

        return response()->json($result);
    }

    /*public function actionTotal($pre_total, $bonus, $use_bonus){
        if($use_bonus){
            return ($pre_total - $bonus);
        }
        else{
            return ($pre_total);
        }*/

    public function actionCount(Request $request){
        // Получить количество товаров

        $total = 0;

        foreach ($request->session()->get('plates') as $arr){
            $total = $total + $arr['count'];
        }

        $data = array('total' => $total);

        return response()->json($data);
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
