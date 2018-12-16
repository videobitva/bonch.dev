<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function addFavourite(Request $request)
    {
        if (User::where('id', '=', Auth::id())->get()[0]->favourite) {
            $list = User::where('id', '=', Auth::id())->get()[0]->favourite;

            User::where('id', '=', Auth::id())->update(array('favourite' => json_encode($list)));

            return response()->json(User::where('id', '=', Auth::id())->get()[0]->favourite);

        }
    }
    public function getFavourite()
    {
        $favourite = array('favourites' => User::where('id','=',Auth::id())->get()[0]->favourite);
        return response()->json($favourite);

    }

    public function getUserID(){
        return Auth::id();
    }
    public function getUserInfo(){
        return response()->json(User::where('id','=',Auth::id())->get()[0]);
    }
}