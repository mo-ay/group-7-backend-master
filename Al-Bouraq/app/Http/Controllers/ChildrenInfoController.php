<?php

namespace App\Http\Controllers;

use App\ChildrenInfo;
use App\Http\Requests\ChildrenInfoValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChildrenInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        //retrieve all children info
        return response()->json(ChildrenInfo::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ChildInfoValidator $request
     * @return JsonResponse
     */
    public function store(ChildrenInfoValidator $request)
    {
        //
        $data  = new ChildrenInfo();
        try
        {
            $data->fill($request->all())->save();
            return response()->json(['data'=> $data],200);
        }
        catch(\Exception $e)
        {
            return response()->json(['data'=>'could not be added'],500);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  ChildrenInfoValidator  $childrenInfo
     * @return \Illuminate\Http\Response
     */
    public function show(ChildrenInfo $childrenInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ChildrenInfoValidator $request
     * @param $id
     * @return JsonResponse
     */
    public function update(ChildrenInfoValidator $request, $id)
    {
        //
        $data = ChildrenInfo::find($id);

        if($data)
        {
            //Fill all fields with request data and return response if record saved
            try
            {
                $data->update($request->all())->save();
                return response()->json(['data'=> $data],200);
            }
            catch(\Exception $e)
            {
                return response()->json(['data'=>'not updated'],500);
            }
            finally
            {
                return response()->json(['data'=>'could not be found'],500);
            }        
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        //find record with provided ID
        $data = ChildrenInfo::findOrFail($id);
        //delete data if found and return deleted response, otherwise return error
        try
        {
            $data->delete();
            return response()->json(['data'=> "deleted"],200);
        }
        catch(\Exception $e)
        {
            return response()->json(['data'=>'row could not be deleted'],500);
        }
    }

}
