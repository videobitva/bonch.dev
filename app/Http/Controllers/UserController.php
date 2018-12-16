<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function addFavourite(Request $request)
    {
        if (User::where('id','=',Auth::id())->get()[0]->favourite){
            $list = User::where('id','=',Auth::id())->get()[0]->favourite;
            if (is_array(json_decode($list))){
                $list = array_push(json_decode($list),$request->get('id'));
            }
            else{
                $list= array(json_decode($list), $request->get('id'));
            }
        }
        else{
            $list = $request->get('id');
        }

        User::where('id','=', Auth::id())->update(array('favourite' => json_encode($list)));

        return response()->json(User::where('id','=',Auth::id())->get()[0]->favourite);

    }
    public function getFavourite()
    {
        $favourite = array('favourites' => User::where('id','=',Auth::id())->get()[0]->favourite);

        return response()->json($favourite);

    }

    public function getUser(){
        return Auth::id();
    }
}
