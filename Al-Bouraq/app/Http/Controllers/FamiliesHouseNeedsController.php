<?php

namespace App\Http\Controllers;

use App\FamiliesHouseNeeds;
use Illuminate\Http\Request;

class FamiliesHouseNeedsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(FamiliesHouseNeeds::all());
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
        public function store(FamiliesHouseNvalidatior $request){
            try{
               $data  = new FamiliesHouseNeeds();
               $data->fill($request->all());
                   $data->save();   
               return response()->json([
                   'error' => false,
                   'message' => "The families house needs has been added successfully"
               ],200);
           }catch  (\Illuminate\Database\QueryException $exception){
               $errorInfo = $exception->errorInfo;
               return response()->json([
                   'error' => true,
                   'message' => "Internal error occured",
                   'errormessage' => $errorInfo
               ],500);
       
           }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FamiliesHouseNeeds  $familiesHouseNeeds
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FamiliesHouseNeeds  $familiesHouseNeeds
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FamiliesHouseNeeds  $familiesHouseNeeds
     * @return \Illuminate\Http\Response
     */
    public function update(FamiliesHouseNvalidatior $request,$id)
    {
        $info = FamiliesHouseNeeds::find($id);
        //what is the best way to validate the update request
        if($info){

            $info->update($request->all());//because we used fillable
            if($info->save()){
                return response()->json([
                    'data'=> $info
                ],200);
            }
            else
            {
                return response()->json([
                    'data'=>'not updated'
                ],500);
            }
        }
        return response()->json([
            'data'=>'could not be found'
        ],500);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FamiliesHouseNeeds  $familiesHouseNeeds
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = FamiliesHouseNeeds::findOrFail($id);
        try{($data->delete());
            return response()->json([
                'data'=> "deleted"
            ],200);
        }
        catch(\Exception $e){
           
            return response()->json([
                'error' => true,
                'message' => "Internal error occured"
            ],500);
           }
           catch(\Exception $e){
            return response()->json([
                'error' => true,
                'message' =>"Internal error occured"
            ],500);
           }
    }
}
