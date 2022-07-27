<?php

namespace App\Http\Controllers;

use App\HouseNeeds;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Requests\HouseNvalidatior;

class HouseNeedsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(HouseNeeds::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HouseNvalidatior $request)
    {
        try{
            $data  = new HouseNeeds();
            $data->fill($request->all());
                $data->save();   
            return response()->json([
                'error' => false,
                'message' => "The house needs has been added successfully"
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
     * @param  \App\HouseNeeds  $houseNeeds
     * @return \Illuminate\Http\Response
     */
    

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HouseNeeds  $houseNeeds
     * @return \Illuminate\Http\Response
     */
    public function update(HouseNvalidatior $request,$id)
    {
        
        $info = HouseNeeds::find($id);
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
     * @param  \App\HouseNeeds  $houseNeeds
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data =HouseNeeds::findOrFail($id);
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
