<?php

namespace App\Http\Controllers;

use App\Responses;
use App\role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return Responses::success(role::all());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $role = new role();
        return $role->save() ?
            Responses::success($role):
            Responses::failure();
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        if ($data = role::find($id)){
            Responses::success($data);
        }
        Responses::failure();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\role  $role
     * @return JsonResponse
     */
    public function update(Request $request,$id)
    {
        $data = role::find($id);
        if($data){
            $data->update($request->all());
            if ($data->save()){
                return Responses::success($data);
            }
            Responses::failure();
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
        $role = role::find($id);
        if($role->delete()){
            return Responses::success("deleted");
        }
        Responses::failure();
    }
}
