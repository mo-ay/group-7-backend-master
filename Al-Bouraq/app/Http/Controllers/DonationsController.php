<?php

namespace App\Http\Controllers;

use App\Donations;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use App\Responses;

class DonationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Responses::success(Donations::all());
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
        $data = new Donations();
        $data->fill($request->all());
        if($data->save())
        {
            return $data;
        }
        return null;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donations  $donations
     * @return \Illuminate\Http\Response
     */
    public function show(Donations $donations, $id)
    {
        //
        $data = Donations::find($id);
        return Responses::success($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donations  $donations
     * @return \Illuminate\Http\Response
     */
    public function edit(Donations $donations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donations  $donations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donations $donations, $id)
    {
        //
        $info = Donations::find($id);
        if($info){
            $info->update($request->all());
            if($info->save())
            {
            //     return response()->json(['info'=> $info],200);
                return $info;
            }
            // return response()->json(['info'=>'could not be added'],500);
            return null;
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donations  $donations
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $info = Donations::find($id);
        if($info->delete())
        {
            return  'deleted';
        }
        else
        {
             return null;
        }
    }
}
