<?php

namespace App\Http\Controllers;

use App\Plate;
use Illuminate\Http\Request;

class PlateController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function LabelOrder(Request $request, $label)
    {
        {
            $result = DB::table('plates')
                ->join('label', 'plates.id_label', '=', 'label.id')
                ->join('singer', 'plates.id_singer', '=', 'singer.id')
                ->join('genre', 'plates.id_genre', '=', 'genre.id')
                ->select('plates.name','singer.name','genre.name','plate.year_issue','label.name','plates.price' )
                ->where('label.id', '=', $label)
                ->get();

        return response()->json($result);
        }
    }

    public function GenreOrder(Request $request, $genre)
    {
        {
            $result = DB::table('plates')
                ->join('label', 'plates.id_label', '=', 'label.id')
                ->join('singer', 'plates.id_singer', '=', 'singer.id')
                ->join('genre', 'plates.id_genre', '=', 'genre.id')
                ->select('plates.name','singer.name','genre.name','plate.year_issue','label.name','plates.price' )
                ->where('genre.id', '=', $genre)
                ->get();

            return response()->json($result);
        }
    }

    public function CountryOrder(Request $request, $country)
    {
        {
            $result = DB::table('plates')
                ->join('label', 'plates.id_label', '=', 'label.id')
                ->join('countries', 'plates.id_country', '=', 'country.id')
                ->join('singer', 'plates.id_singer', '=', 'singer.id')
                ->join('genre', 'plates.id_genre', '=', 'genre.id')
                ->select('plates.name','singer.name','genre.name','plate.year_issue','label.name','plates.price' )
                ->where('countries.id', '=', $country)
                ->get();

            return response()->json($result);
        }
    }

    public function StateOrder(Request $request, $state)
    {
        {
            $result = DB::table('plates')
                ->join('label', 'plates.id_label', '=', 'label.id')
                ->join('state', 'plates.id_state', '=', 'state.id')
                ->join('singer', 'plates.id_singer', '=', 'singer.id')
                ->join('genre', 'plates.id_genre', '=', 'genre.id')
                ->select('plates.name','singer.name','genre.name','plate.year_issue','label.name','plates.price' )
                ->where('state.id', '=', $state)
                ->get();

            return response()->json($result);
        }
    }

    public function YearIssueOrder(Request $request, $yearissue_1, $yearissue_2)
    {
        {
            $result = DB::table('plates')
                ->join('label', 'plates.id_label', '=', 'label.id')
                ->join('state', 'plates.id_state', '=', 'state.id')
                ->join('singer', 'plates.id_singer', '=', 'singer.id')
                ->join('genre', 'plates.id_genre', '=', 'genre.id')
                ->select('plates.name','singer.name','genre.name','plate.year_issue','label.name','plates.price' )
                ->where('plates.year_issue','=',$yearissue_1, 'between','plates.year_issue','=',$yearissue_2)
                ->get();

            return response()->json($result);
        }
    }

    public function YearPublishingOrder(Request $request, $yearpub_1, $yearpub_2)
    {
        {
            $result = DB::table('plates')
                ->join('label', 'plates.id_label', '=', 'label.id')
                ->join('state', 'plates.id_state', '=', 'state.id')
                ->join('singer', 'plates.id_singer', '=', 'singer.id')
                ->join('genre', 'plates.id_genre', '=', 'genre.id')
                ->select('plates.name','singer.name','genre.name','plate.year_issue','label.name','plates.price' )
                ->where('plates.year_publishing','=',$yearpub_1, 'between','plates.year_publishing','=',$yearpub_2)
                ->get();

            return response()->json($result);
        }
    }

    public function Catalog(Request $request)
    {
        {
            $result = DB::table('plates')
                ->join('label', 'plates.id_label', '=', 'label.id')
                ->join('state', 'plates.id_state', '=', 'state.id')
                ->join('singer', 'plates.id_singer', '=', 'singer.id')
                ->join('genre', 'plates.id_genre', '=', 'genre.id')
                ->select('plates.name','singer.name','genre.name','plate.year_issue','label.name','plates.price' )
                ->orderby('plates.price','ask')
                ->get();

            return response()->json($result);
         }
    }

    public function CardPlate(Request $request, $id)
    {
        {
            $result = DB::table('plates')
                ->join('label', 'plates.id_label', '=', 'label.id')
                ->join('countries', 'plates.id_country', '=', 'country.id')
                ->join('state', 'plates.id_state', '=', 'state.id')
                ->join('singer', 'plates.id_singer', '=', 'singer.id')
                ->join('genre', 'plates.id_genre', '=', 'genre.id')
                ->update('plates.bonus')
                ->set('plates.bonus','=','plates.price','*','0.1')
                ->select('plates.name','singer.name','genre.name','countries.name','plates.year_issue','plates.year_publishing','state.name','plates.price','plates.bonus','plates.track_list' )
                ->where('plates.id','=',$id)
                ->get();

            return response()->json($result);
        }
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plate $plate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        //
    }
}
