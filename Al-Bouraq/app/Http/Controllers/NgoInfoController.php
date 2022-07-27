<?php

namespace App\Http\Controllers;

use App\NgoInfo;

use App\Responses;
use Illuminate\Http\Request;

class NgoInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=NgoInfo::all();
        if($data){
          return Responses::success($data);
        }else{
          return  Responses::failure();
        }
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
        $data=new NgoInfo();
        $data->fill($request->all());
        $data->save();
        if($data){
            return Responses::success($data);
        }
        return Responses::failure($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NgoInfo  $ngoInfo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=NgoInfo::where('id',$id)->get();
        if($data)
        {
            return Responses::success($data);
        }
            return Responses::failure($data);

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NgoInfo  $ngoInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(NgoInfo $ngoInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NgoInfo  $ngoInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=NgoInfo::find($id);
        if($data)
        {
         $data->update($request->all());
         if ($data->save()){
         return Responses::success($data);
         }
         return Responses::failure($data);
        }
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NgoInfo  $ngoInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=NgoInfo::find($id);
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
