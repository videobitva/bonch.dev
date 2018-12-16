<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function addFavourite(Request $request)
    {
        $addition = array($request->get('id'));

        if(!User::where('id', '=', Auth::id())->get()[0]->favourite) {
            User::where('id', '=', Auth::id())->update(['favourite' => json_encode($addition)]);
        }
        else{
            if (in_array($request->get('id'), json_decode(User::where('id', '=', Auth::id())->get()[0]->favourite))){
                return response(User::where('id', '=', Auth::id())->get()[0]->favourite);
            }
            User::where('id', '=', Auth::id())->update(['favourite' => json_encode(array_merge(json_decode(User::where('id', '=', Auth::id())->get()[0]->favourite),$addition))]);
        }
        return response(User::where('id', '=', Auth::id())->get()[0]->favourite);
    }

    public function getFavourite()
    {
        return response(User::where('id','=',Auth::id())->get()[0]->favourite);
    }

    public function removeFavourite(Request $request)
    {
        $target_id = array_search($request->get('id'), json_decode(User::where('id', '=', Auth::id())->get()[0]->favourite));
        $new_fav = json_decode(User::where('id', '=', Auth::id())->get()[0]->favourite);
        unset($new_fav[$target_id]);
        User::where('id', '=', Auth::id())->update(['favourite' => json_encode($new_fav)]);
        return response(User::where('id', '=', Auth::id())->get()[0]->favourite);
    }


    public function getUserID(){
        return response()->json(Auth::id());
    }
    public function getUserInfo(){
        return response()->json(Auth::user());
    }
}
