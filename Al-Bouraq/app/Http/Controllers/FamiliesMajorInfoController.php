<?php

namespace App\Http\Controllers;

use App\ChildrenInfo;
use App\FamiliesHouseNeeds;
use App\FamiliesHouseTypes;
use App\FamiliesHusbandStatuses;
use App\FamiliesMajorInfo;
use App\FamiliesExclusiveInfo;
use App\FamiliesNgoRelations;
use App\Http\Requests\FMIRvalidatior;
use App\Repositories\FamiliesMajorInfoRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use App\Responses;


class FamiliesMajorInfoController extends Controller
{
    protected $familyMajorInfoRepo;

    public function __construct(FamiliesMajorInfoRepository $repository)
    {
        $this->familyMajorInfoRepo = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {

        $FMajorInfoModel= new FamiliesMajorInfo();
        $FMajorInfoData = $this->familyMajorInfoRepo->index($FMajorInfoModel);
        if($FMajorInfoData)
        {
            return Responses::success($FMajorInfoData);
        }
        return Responses::failure();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FMIRvalidatior $request
     * @return JsonResponse
     */
    public function store(FMIRvalidatior $request)
    {
              
        //create new instance to send it to the repo
        $familyMajorInfoModel = new FamiliesMajorInfo();
        $inserted_data = array();

        try {
            //insert in  family major
            $familyMajorInfoRow = $this->familyMajorInfoRepo->store($familyMajorInfoModel, $request);
            $inserted_data[] = $familyMajorInfoRow;

            //insert all children
            $i = 1;
            //if child_data i not null
            while ($child_data = $request->input('child'.$i++)){
                $child = new ChildrenInfo();
                $child->fill($child_data);
                $childrenRow = $familyMajorInfoRow->childrenInfo()->create($child->toArray());
                $inserted_data[] = $childrenRow;
            }
            //INSERT all husband statuses
            $i = 1;
            while ($husband_data = $request->input('husbands'.$i++)){
                $husband_status = new FamiliesHusbandStatuses();
                $husband_status->fill($husband_data);
                $husband_statusRow = $familyMajorInfoRow->husbandStatuseInsert()->create($husband_status->toArray());
                $inserted_data[] = $husband_statusRow;
            }
            //insert all house type
            $i = 1;
            while ($house_data = $request->input('houset'.$i++)){
                $houseType = new FamiliesHouseTypes();
                $houseType->fill($house_data);
                $houseTypeRow = $familyMajorInfoRow->houseTypesInsert()->create($houseType->toArray());
                $inserted_data[] = $houseTypeRow;
            }
            //insert all house needs
            $i = 1;
            while ($house_data = $request->input('housen'.$i++)){
                $houseNeed = new FamiliesHouseNeeds();
                $houseNeed->fill($house_data);
                $houseNeedRow = $familyMajorInfoRow->houseNeedsInsert()->create($houseNeed->toArray());
                $inserted_data[] = $houseNeedRow;
            }
            //insert all ngo
            $i = 1;
            while ($ngo_data = $request->input('ngoh'.$i++)){
                $houseNgo = new FamiliesNgoRelations();
                $houseNgo->fill($ngo_data);
                $houseNgoRow = $familyMajorInfoRow->ngoInfoInsert()->create($houseNgo->toArray());
                $inserted_data[] = $houseNgoRow;
            }

            //exceptional family
            if($request->input('family_type_id') == 1){
                $exceptionalRow = $familyMajorInfoRow->exceptionalFamilies()->create($request->all());
                $inserted_data[] = $exceptionalRow;
                //exclusive family
            }else{
                //insert in exclusive first
                $familyExclusiveInfoRow = $familyMajorInfoRow->familiesExclusiveInfo()->create($request->all());
                $inserted_data[] =$familyExclusiveInfoRow;
                //lebanese family
                if($request->input('family_type_id') == 2){
                    //insert in lebanese
                    $lebaneseRow = $familyMajorInfoRow->lebaneseFamilies()->create($request->all());
                    $inserted_data[]= $lebaneseRow;
                    //syrian family
                }else if ($request->input('family_type_id') ==   3){
                    $syrianRow = $familyMajorInfoRow->syrianFamilies()->create($request->all());
                    $inserted_data[]= $syrianRow;
                }
            }
            return Responses::success($inserted_data);
        }catch (\Exception $e){
            return Responses::failure($e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $data = $this->familyMajorInfoRepo->show($id);
        if($data)
        {
            return Responses::success($data);
        }
        return Responses::failure();
    }

    public function search($type,$param)
    {
        // dd($type);
        $data = $this->familyMajorInfoRepo->search($type, $param);
        if($data)
        {
            return Responses::success($data);
        }
        return Responses::failure();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FMIRvalidatior $request
     * @param $id
     * @return JsonResponse
     */
    public function update( FMIRvalidatior $request,$id)
    {
        //
        $data = $this->familyMajorInfoRepo->update($request, $id);
        if($data)
        {
            return Responses::success($data);
        }
        return Responses::failure();
    }

        /**
     * Update the specified resource in storage.
     *
     * @param FMIRvalidatior $request
     * @param $id
     * @return JsonResponse
     */
    public function edit(FMIRvalidatior $request)
    {
        //
    //     $data = $this->familyMajorInfoRepo->edit($request);
    //     if($data)
    //     {
    //         return Responses::success($data);
    //     }
    //     return Responses::failure();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        //
        $data = $this->familyMajorInfoRepo->destroy($id);
        if($data)
        {
            return response()->json([
                'message'=>"Deleted Completely"
            ]);
        }
        return Responses::failure("Already deleted");
    }

    //destroyFamilyAppointment
    public function destroyFamilyAppointment($nextAppointment,$id): JsonResponse
    {
        //
        $data = $this->familyMajorInfoRepo->destroyFamilyAppointment($nextAppointment, $id);
        if($data)
        {
            return response()->json([
                'message'=>"Appointment Canceled"
            ]);
        }
        return Responses::failure("Already Canceled");
    }
}
