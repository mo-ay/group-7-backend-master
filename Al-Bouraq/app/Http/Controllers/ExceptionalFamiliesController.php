<?php

namespace App\Http\Controllers;

use App\ExceptionalFamilies;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Requests\ExceptionalFvalidatior;

class ExceptionalFamiliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(ExceptionalFamilies::all());
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExceptionalFvalidatior $request){
     try{
        $data  = new ExceptionalFamilies();
        $data->fill($request->all());
            $data->save();   
        return response()->json([
            'error' => false,
            'message' => "The exceptional has been added successfully"
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
     * @param  \App\ExceptionalFamilies  $exceptionalFamilies
     * @return \Illuminate\Http\Response
     */
   
  
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExceptionalFamilies  $exceptionalFamilies
     * @return \Illuminate\Http\Response
     */
    public function update(ExceptionalFvalidatior $request,$id)
    {
        $info = ExceptionalFamilies::find($id);
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
     * @param  \App\ExceptionalFamilies  $exceptionalFamilies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ExceptionalFamilies::findOrFail($id);
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