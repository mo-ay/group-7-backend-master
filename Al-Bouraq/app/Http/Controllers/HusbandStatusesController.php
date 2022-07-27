<?php

namespace App\Http\Controllers;

use App\Http\Requests\HusbandStatusesValidator;
use App\HusbandStatuses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mockery\Exception;

class HusbandStatusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        // get all statuses
        return response()->json(HusbandStatuses::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param HusbandStatusesValidator $request
     * @return JsonResponse
     */
    public function store(HusbandStatusesValidator $request): JsonResponse
    {
        //create new instance
        $data = new HusbandStatuses();
        //fill the data and return true if got saved | false if couldn't save
        $data->fill($request->all());
        try {
            $data->save();
            return response()->json([
                'data'=> $data
            ],200);
        }catch (\Exception $e){
            return response()->json([
                'data'=>'could not be added'
            ],500);
        } finally {
            return response()->json([
                'data'=>'could not be added'
            ],500);
        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param HusbandStatusesValidator $request
     * @param $id
     * @return JsonResponse
     */
    public function update(HusbandStatusesValidator $request, $id): JsonResponse
    {
        //
        $info = HusbandStatuses::find($id);
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
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {

        $data = HusbandStatuses::find($id);
        //check if we find the data
        if($data) {
            //try to delete it
            try {
                $data->delete();
                //if we can delete it return true
                return response()->json([
                    'data' => "deleted"
                ], 200);
                //if we cant delete it
            } catch (\Exception $e) {
                //we can write the error into daily log file to be reviewed letter
               // logger('daily',$e);
                return response()->json([
                    'data' => ' could not be deleted maybe because it hase relation '
                ], 500);
            }
        }
        //if the data not found
        return response()->json([
            'data' => ' not found '
        ], 500);

    }
}
