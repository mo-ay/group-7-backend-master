<?php

namespace App\Http\Controllers;

use App\HouseTypes;
use App\Http\Requests\HouseTypesValidator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mockery\Exception;

class HouseTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all house types
        return response()->json(HouseTypes::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param HouseTypesValidator $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create new house type instance
        $data = new HouseTypes();
        // Return data if saved, error otherwise
        $data->fill($request->all());
        try
        {
            $data->save();
            return response()->json(['data' => $data], 200);
        }
        catch(\Exception $e)
        {
            return response()->json(['message' => 'Could not be added'], 500 );
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HouseTypes  $houseTypes
     * @return \Illuminate\Http\Response
     */
    public function show(HouseTypes $houseTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \HouseTypesValidator $houseTypes
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(HouseTypesValidator $request, $id)
    {
        // FInd record from provided id
        $data = HouseTypes::find($id);
        // Fill data and update record if found, return error otherwise
        if($data->update($request->all()))
        {
            try
            {
                $data->save();
                return response()->json([
                    'message'=>'Record has been updated',
                    'data' => $data
                    ]);
            }
            catch(\Exception $e)
            {
                return response()->json(['message' => 'Record not found'], 401);
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Select record by provided id
        $data = HouseTypes::find($id);
        // Delete if found, return error otherwise
        if($data)
        {
            try
            {
                $data->delete();
                return response()->json(['message' => 'Record Deleted'], 200);
            }
            catch(\Exception $e)
            {
                return response()->json(['message' => 'Record not found'], 401);
            }
            
        }

    }
}
