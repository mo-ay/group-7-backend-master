<?php

namespace App\Repositories;

use App\Appointments;
use App\ChildrenInfo;
use App\Donations;
use App\ExceptionalFamilies;
use App\FamiliesExclusiveInfo;
use App\FamiliesHouseNeeds;
use App\FamiliesHouseTypes;
use App\FamiliesHusbandStatuses;
use App\FamiliesNgoRelations;
use App\LebaneseFamilies;
use App\SyrianFamilies;
use Carbon\Carbon;
use App\Repositories\Interfaces\FamiliesMajorInfoInterface;

use App\FamiliesMajorInfo;
use App\FamilyDonationHistory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Model;


class FamiliesMajorInfoRepository implements FamiliesMajorInfoInterface{

    /**
     * @return Builder[]|Collection|mixed|null
     */
     public function index(Model $model)
     {
          //get husband statuses
          $data =$model::with('exceptionalFamilies','familiesExclusiveInfo','lebaneseFamilies','syrianFamilies','childrenInfo','husbandStatuse','houseTypes','houseNeeds')
          ->with('ngoInfo')
          ->with('familiesType')
          ->with('appointments')
          ->paginate(10);
          //dd(Carbon::now());
          return $data ? $data : null;

      }

    /**
     * @param Model $model
     * @param FormRequest $request
     * @return Model|null
     */
     public function store(Model $model, FormRequest $request)
     {
          $data = $model;
          $data->fill($request->all());
          if($data->save())
          {
              return $data;
          }
          return null;

      }

    /**
     * @param $id
     * @return mixed
     */
     public function show($id)
     {
          $data = FamiliesMajorInfo::where('id',$id)
          ->with('exceptionalFamilies')
          ->with('familiesExclusiveInfo')
          ->with('lebaneseFamilies')
          ->with('syrianFamilies')
          ->with('childrenInfo')
          ->with('husbandStatuse')
          ->with('houseTypes')
          ->with('houseNeeds')
          ->with('ngoInfo')
          ->with('familiesType')
          ->with('appointments')
          ->get();
          return $data;
     }

     public function search($type, $param)
     {

          $data = FamiliesMajorInfo::where($type,'LIKE', '%'.$param.'%')
          ->with('exceptionalFamilies')
          ->with('familiesExclusiveInfo')
          ->with('lebaneseFamilies')
          ->with('syrianFamilies')
          ->with('childrenInfo')
          ->with('husbandStatuse')
          ->with('houseTypes')
          ->with('houseNeeds')
          ->with('ngoInfo')
          ->with('familiesType')
          ->with('appointments')
          ->get();
          return $data;
     }

    /**
     * @param FormRequest $request
     * @param $id
     * @return mixed|null
     */
     public function update(FormRequest $request, $id)
     {
          //

          $info = FamiliesMajorInfo::find($id);
          //what is the best way to validate the update request
          if($info){

              $donation = new Donations();
              $donation->fill($request->all());
              $info->donations()->update($donation->toArray());
              /**
               * enhancement to be done later
               * optional for now
               */
              // the if should be to all filed to avoid get null
              $exceptional = new ExceptionalFamilies();
              if(sizeof($data =$exceptional->fill($request->all())->toArray()) >0) {
                  $info->exceptionalFamilies()->update($data);
              }

              $fexc = new FamiliesExclusiveInfo();
              $fexc->fill($request->all());
              $info->familiesExclusiveInfo()->update($fexc->toArray());

              $lf= new LebaneseFamilies();
              $lf->fill($request->all());
              $info->lebaneseFamilies()->update($lf->toArray());

              $sf= new SyrianFamilies();
              $sf->fill($request->all());
              $info->syrianFamilies()->update($sf->toArray());

              $fht= new FamiliesHouseTypes();
              $fht->fill($request->all());
              $info->houseTypes()->update($fht->toArray());

              $fhs= new FamiliesHusbandStatuses();
              $fhs->fill($request->all());
              $info->husbandStatuse()->update($fhs->toArray());

              $fhn= new FamiliesHouseNeeds();
              $fhn->fill($request->all());
              $info->houseNeeds()->update($fhn->toArray());

              $fngo= new FamiliesNgoRelations();
              $fngo->fill($request->all());
              $info->ngoInfo()->update($fngo->toArray());

              $fa = new Appointments();
              $fa->fill($request->all());
              $info->appointments()->update($fa->toArray());

              $ch = new ChildrenInfo();
              $ch->fill($request->all());
              $info->childrenInfo()->update($ch->toArray());



              $info->fill($request->all());

              if($info->save())
              {
                  return $this->show($info->id);
              }
          }
          return null;
       }

    /**
     * @param FormRequest $request
     * @param $id
     * @return FamiliesMajorInfo|null
     */
     public function edit(Model $model, FormRequest $request)
     {
          $info = new $model;
          $info->$request->all();

          if($info->save()){
               return $info;
          }
          else{
               return null;
          }

     //      // Retrieve the record with parent ID
     //      $info = FamiliesMajorInfo::find($id);

     //      // Create new instance
     //      $data = new FamiliesMajorInfo();

     //      // Fill all data into new record
     //      $data->fill($request->all());
     //      if($info->parent_id != 0){
     //           $data->parent_id=$info->parent_id;
     //      }else{
     //           $data->parent_id = $info->id;
     //      }

     //      // Target most recent record
     //      $recent = FamiliesMajorInfo::where(
     //           'parent_id', $info->parent_id,

     //       )->get();

     //       // Set parent record recent value to 0
     //      $parent = FamiliesMajorInfo::find($info->parent_id);
     //      if($parent){
     //           $parent->recent = 0;
     //           $parent->save();
     //      }

     //      // Set all old records recent value to 0
     //      foreach($recent as $recentData){
     //           $recentData->recent = 0;
     //           $recentData->save();
     //      }
     //      $data->recent=1;
     //      $info->recent = 0;

     //      // Save and insert new row into Database
     //      if($data){
     //          if($data->save() && $info->save())
     //          {
     //              return $data;
     //          }
     //      }
     //      return null;
       }

    /**
     * @param $id
     * @return string|null
     */
     public function destroy($id): ?string
     {
          //detach() to delete the many to many relation in the pivot table with all the additional data in the pivot table
          //deleteHasRelation is a custom function in the familiesMajorInfo model see its notes there
          $data = FamiliesMajorInfo::find($id);
          $data->husbandStatuse()->detach();
          $data->houseNeeds()->detach();
          $data->houseTypes()->detach();
          $data->ngoInfo()->detach();
          $data->deleteHasRelations();
          // $data->husbandStatuse()->detach();
          if($data->delete())
          {
              return  'Deleted';
          }
          else
          {
               return null;
          }

      }

      public function destroyFamilyAppointment($nextAppointment,$id): ?string
      {
           $data = FamiliesMajorInfo::find($id);
           $data->deleteAppointment($nextAppointment);


               return  'Appointment Canceled';


       }

}
