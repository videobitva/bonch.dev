<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Controllers\CartController;

class OrderController extends Controller
{
    public function make(Request $request){

        //Getting dependencies..

        $user_id = $request->session()->get('user_id');
        $country_id = DB::table('countries')
            ->select('id')
            ->where('name', '=', $request->session()->get('country'))
            ->get();
        $address = $request->session()->get('address');
        $index = $request->session()->get('index');
        $phone_number = $request->session()->get('phone_number');

        $plate_id = array();
        $total = null;

        foreach ($request->session()->get('plates') as $arr){
            $price = DB::table('plates')
                ->select('price')
                ->where('id', '=', $arr['id_plate'])
                ->get();
            $total =  $total + $arr['count']*$price;
            array_pull($plate_id, $arr['id_plate']);
        }

        //Writing order..

        DB::insert('insert into order (id_user, id_country, address, index, phone_number, id_plate, total) values (?, ?, ?, ?, ?, ?, ?)',
            [$user_id, $country_id, $address, $index, $phone_number, $plate_id, $total]);

        //Clearing Session..

        $request->session()->flush();

        //End of work..

        return response()->json('Order was successfully made');
    }
}
