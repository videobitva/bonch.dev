<?php

namespace App\Http\Controllers;

use App\Cart;

use Illuminate\Http\Request;
use DB;
use Auth;


class CartController extends Controller
{
    public function actionAdd(Request $request)
    {
        $id_plate = $request->get('id_plate');

        if (!$request->session()->has('cart')){
            $cart = new Cart();
            $request->session()->put('cart', $cart->add($id_plate));
        }
        else{
            $request->session()->put('cart', $request->session()->get('cart')->add($id_plate));
        }
        return response()->json($request->session()->get('cart')->cart);
    }

    public function actionDelete(Request $request)
    {
        $id_plate = $request->get('id_plate');
        $cart = $request->session()->get('cart');

        $request->session()->put('cart',$cart->remove($id_plate));
        return response()->json($request->session()->get('cart')->cart);
    }

    public function actionShow(Request $request)
    {
        return response()->json($request->session()->get('cart')->cart);
    }

    public function actionCount(Request $request){
        return response()->json(array_keys($request->session()->get('cart')->cart)-1);
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
