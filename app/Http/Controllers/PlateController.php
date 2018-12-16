<?php

namespace App\Http\Controllers;

use App\Plate;
use App\Models\Label;
use App\Models\Genre;
use App\Models\Singer;
use App\Models\State;

use Illuminate\Http\Request;

class PlateController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function sortCatalog(){
         $results=Plate::with('Label','Genre','Singer')
             ->get();
         foreach ($results as $result){
             $data[] = $result;
         }
         return response()->json($data);
     }

    public function sortGenre(Request $request){
        $genre = $request->get('genre');
        $results=Plate::with('Label','Genre','Singer')
            ->where('id_genre',$genre)
            ->get();
        foreach ($results as $result){
            $data[] = $result;
        }
        return response()->json($data);
    }

    public function sortCountry(Request $request){
        $country = $request->get('country');
        $results=Plate::with('Label','Genre','Singer')
            ->where('id_country',$country)
            ->get();
        foreach ($results as $result){
            $data[] = $result;
        }
        return response()->json($data);
    }

    public function sortLabel(Request $request){
        $label = $request->get('label');
        $results=Plate::with('Label','Genre','Singer')
            ->where('id_label',$label)
            ->get();
        foreach ($results as $result){
            $data[] = $result;
        }
        return response()->json($data);
    }

    public function sortState(Request $request){
        $state = $request->get('state');
        $results=Plate::with('Label','Genre','Singer')
            ->where('id_state',$state)
            ->get();
        foreach ($results as $result){
            $data[] = $result;
        }
        return response()->json($data);
    }

    public function yearIssue(Request $request){
        $year_iss = $request->get('year_iss');
        $results=Plate::with('Label','Genre','Singer')
            ->where("year_issue", $year_iss)
            ->get();
        foreach ($results as $result){
            $data[] = $result;
        }
        return response()->json($data);
    }

    public function yearPublishing (Request $request){
        $year_pub = $request->get('year_pub');
        $results=Plate::with('Label')
            ->where('year_publishing', $year_pub)
            ->get();
        foreach ($results as $result){
            $data[] = $result;
        }
        return response()->json($data);
        /*return response()->json($result);*/
    }

    public function cardPlate(Request $request){
        $id = $request->get('id');
        $results=Plate::with('Label','Genre','Singer','State')
            ->where('id',$id)
            ->get();
        foreach ($results as $result){
            $data[] = $result;
        }
        return response()->json($data);
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
