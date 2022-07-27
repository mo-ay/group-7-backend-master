<?php

namespace App\Http\Controllers;

use App\FamiliesNgoRelations;
use Illuminate\Http\Request;

class FamiliesNgoRelationsController extends Controller
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
        {
            //
            $data = new FamiliesNgoRelations();
            $data->fill($request->all());
            if($data->save())
            {
                return $data;
            }
            return null;
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FamiliesNgoRelations  $familiesNgoRelations
     * @return \Illuminate\Http\Response
     */
    public function show(FamiliesNgoRelations $familiesNgoRelations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FamiliesNgoRelations  $familiesNgoRelations
     * @return \Illuminate\Http\Response
     */
    public function edit(FamiliesNgoRelations $familiesNgoRelations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FamiliesNgoRelations  $familiesNgoRelations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FamiliesNgoRelations $familiesNgoRelations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FamiliesNgoRelations  $familiesNgoRelations
     * @return \Illuminate\Http\Response
     */
    public function destroy(FamiliesNgoRelations $familiesNgoRelations)
    {
        //
    }
}
