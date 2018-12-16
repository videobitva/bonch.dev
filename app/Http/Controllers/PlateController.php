<?php

namespace App\Http\Controllers;

use App\Plate;
use App\Label;
use App\Genre;
use App\Singer;
use App\State;

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
             echo $result;
         }
     }

    public function sortGenre($genre){
        $results=Plate::with('Label','Genre','Singer')
            ->where('id_genre',$genre)
            ->get();
        foreach ($results as $result){
            echo $result;
        }
    }

    public function sortCountry($country){
        $results=Plate::with('Label','Genre','Singer')
            ->where('id_country',$country)
            ->get();
        foreach ($results as $result){
            echo $result;
        }
    }

    public function sortLabel($label){
        $results=Plate::with('Label','Genre','Singer')
            ->where('id_label',$label)
            ->get();
        foreach ($results as $result){
            echo $result;
        }
    }

    public function sortState($state){
        $results=Plate::with('Label','Genre','Singer')
            ->where('id_state',$state)
            ->get();
        foreach ($results as $result){
            echo $result;
        }
    }

    public function yearIssue($year_iss){
        $results=Plate::with('Label','Genre','Singer')
            ->where("year_issue", $year_iss)
            ->get();
        foreach ($results as $result){
            echo $result;
        }
    }

    public function yearPublishing ($year_pub)
{
    $result=Plate::with('Label')
        ->where('year_publishing', $year_pub)
        ->get();
    foreach ($result as $item){
        echo $item;
    }
    /*return response()->json($result);*/
        }

    public function cardPlate($id){
        $results=Plate::with('Label','Genre','Singer','State')
            ->where('id',$id)
            ->get();
        foreach ($results as $result){
            echo $result;
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
