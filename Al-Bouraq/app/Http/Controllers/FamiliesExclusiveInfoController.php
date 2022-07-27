<?php

namespace App\Http\Controllers;

use App\FamiliesExclusiveInfo;
use App\Http\Requests\FamiliesExclusiveInfoValidator;
use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;

class FamiliesExclusiveInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $familiesExclusiveInfo= FamiliesExclusiveInfo::all();
        return response()->json([
            'status'=>200,
            'data'=>$familiesExclusiveInfo,
        ],200);
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
     * @param  \Illuminate\Http\FamiliesExclusiveInfoValidator  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FamiliesExclusiveInfoValidator $request)
    {
        try{
        $payload= new FamiliesExclusiveInfo();
        $payload->fill($request->all());
        $payload->save();

        return response()->json([
            'data'=>$payload,
        ],200);
        }
        catch(QueryException $e){
            return response()->json([
                'error'=>$e,
                'message'=>'this info could not be added'
            ]);
            
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FamiliesExclusiveInfo  $familiesExclusiveInfo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
        $payload=FamiliesExclusiveInfo::where('id',$id)->first();
    
        if($payload)
        {
        return response()->json([
            'payload'=>$payload,
        ],200);
        }
        else
        {
            return response()->json([
                'payload'=>"This record is not exist",
            ],200);
        }
        }
        catch(QueryException $e){
            return response()->json([
                'payload'=>$e,
            ],401);

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FamiliesExclusiveInfo  $familiesExclusiveInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(FamiliesExclusiveInfo $familiesExclusiveInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FamiliesExclusiveInfo  $familiesExclusiveInfo
     * @return \Illuminate\Http\Response
     */
    public function update(FamiliesExclusiveInfoValidator $request,$id)
    {
        try{
        $payload= FamiliesExclusiveInfo::find($id);
        if($payload)
        {
            $payload->update($request->all());
            if($payload->save())
            {
                return response()->json([
                    'payload'=>$payload,
                    'message'=>'your data has been updated '
                ],200);
            }
        }
        else
        {
            return response()->json([
                
                'message'=>'This record is not exist '
            ],401);
        }
       }
       catch(QueryException $e)
       {
        return response([
           'payload'=>$e,
           'message'=>'Your data could not been updated'
        ]);

       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FamiliesExclusiveInfo  $familiesExclusiveInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $payload=FamiliesExclusiveInfo::find($id);

            //checking if the ID has found
            if($payload && $payload->delete())
            {
            return response()->json([
                'payload'=>"Record has been deleted"
            ],200);
            }
            else
            {
                return response()->json([
                    'payload'=>"This record is not exist",
                ],200);
            }
            }catch(QueryException $e){
                return response()->json([
                    'payload'=>$e,
                ],401);
    
            }
    }
}
