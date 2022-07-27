<?php

namespace App\Http\Controllers;

use App\FamiliesTypes;
use App\Responses;
use Illuminate\Http\Request;

class FamiliesTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\FamiliesTypes  $familiesTypes
     * @return \Illuminate\Http\Response
     */
    public function show(FamiliesTypes $familiesTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FamiliesTypes  $familiesTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(FamiliesTypes $familiesTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FamiliesTypes  $familiesTypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FamiliesTypes $familiesTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FamiliesTypes  $familiesTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=FamiliesTypes::find($id);
        if($data){
        if($data->delete())
        {
        return response()->json([
            'message'=>"data deleted",
        ]);
        }
        return Responses::failure('your data may could not been deleted');
    }
        return Responses::failure('data already deleted');
    
    }
}
