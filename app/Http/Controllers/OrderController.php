<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Country;
use App\User;
use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{
    public function order(Request $request){

        $id_user = Auth::id();

        $id_country = Country::where('name',$request->get('country'))->firstOrFail()->id;

        $address = $request->get('address');

        $index = $request->get('index');

        $phone_number = $request->get('phone_number');

        $id_plate = array_keys($request->session()->get('cart')->cart);
        unset($id_plate[array_search('sum',$id_plate)]);
        $id_plate = implode(',',$id_plate);

        $total = $this->total($request);

        Order::create([
            'id_user' => $id_user,
            'id_country' => $id_country,
            'address' => $address,
            'index' => $index,
            'phone_number' => $phone_number,
            'id_plate' => $id_plate,
            'total' => $total
        ]);

        if($request->get('use_bonus')){
            User::where('id','=',$id_user)->update(['bonus' => 0]);
        }
        else{
            User::where('id','=',$id_user)->update(['bonus' =>
                User::where('id','=',$id_user)
                    ->getAttribute('bonus') + $request->session()->get('cart')->cart['sum']*0,1]);
        }

        $request->session()->flush();

        return response()->json('Order was successfully made');
    }

    public function index(Request $request)
    {
        $products = array();

            $cart = json_decode(json_encode($request->session()->get('cart')->cart));

            foreach ($cart as $arr){
                if (!is_int($arr)){
                    array_push($products, $arr);
                }
            }

        return response()->json($products);
    }
    public function total(Request $request)
    {
        $pre_total = $request->session()->get('cart')->cart['sum'];

        if (Auth::check()){

            $bonus = User::where('id', Auth::id())->get()[0]->bonus;

            if($request->get('use_bonus', false)){
                return  ($pre_total - $bonus);
            }
            else{
                return ($pre_total);
            }
        }
            return($pre_total);
    }
}
