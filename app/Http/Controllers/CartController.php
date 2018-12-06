<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use DB;
use function Psy\debug;

class CartController extends Controller
{
    public function add(Request $request)
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
        */

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
