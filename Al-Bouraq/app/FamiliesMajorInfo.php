<?php

namespace App;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FamiliesMajorInfo extends Model
{
    //
    protected $table = "families_major_infos";

    protected $fillable = [
        'family_type_id',
        'interviewer',
        'family_name',
        'survey_date',
        'phone_number',
        'area',
        'husband_name',
        'husband_nationality',
        'husband_idimage',
        'husband_date_of_birth',
        'wife_nationality',
        'wife_marital_status',
        'wife_date_of_birth',
        'wife_profession',
        'wife_income',
        'family_full_address',
        'number_of_residents',
        'living_with',
        'existing_medical_conditions',
        'medical_condition_name',
        'health_risk_persons',
        'doctor_name',
        'medication_name',
        'medication_price',
        'code',
        'parent_id',
        'recent'
    ];

    /**
     * @return BelongsToMany
     */
    public function husbandStatuse()
    {
        return $this->belongsToMany('App\HusbandStatuses','families_husband_statuses','family_id','husband_status_id');
    }

    /**
     * @return BelongsToMany
     */
    public function houseNeeds()
    {
        return $this->belongsToMany('App\HouseNeeds', 'families_house_needs','family_id', 'house_need_id');
    }

    /**
     * @return HasOne
     */
    public function exceptionalFamilies()
    {
        return $this->hasOne('App\ExceptionalFamilies', 'family_id','id');
    }

    /**
     * @return HasOne
     */
    public function familiesExclusiveInfo()
    {
        return $this->hasOne('App\FamiliesExclusiveInfo','family_id','id');
    }

    /**
     * @return HasOne
     */
    public function lebaneseFamilies()
    {
        return $this->hasOne('App\LebaneseFamilies', 'family_id','id');
    }

    /**
     * @return HasOne
     */
    public function syrianFamilies()
    {
        return $this->hasOne('App\SyrianFamilies', 'family_id','id');
    }

    /**
     * @return HasMany
     */
    public function childrenInfo()
    {
        return $this->hasMany('App\ChildrenInfo','family_id','id');
    }

    /**
     * @return BelongsToMany
     */
    public function houseTypes()
    {
        return $this->belongsToMany('App\HouseTypes','families_house_types','family_id','house_type_id');
    }

    /**
     * @return BelongsToMany
     */
    public function ngoInfo()
    {
        return $this->belongsToMany(
         'App\NgoInfo',
         'families_ngo_relations',
         'family_id','ngo_id')
        ->withPivot(
         'child_aid_amount',
         'total_aid_amount',
         'ramadan_additional_aid',
         'monthly_warranty');
    }

    /**
     * @return HasMany
     */
    public function donations()
    {
        return $this->hasMany('App\FamilyDonationHistory', 'family_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function familiesType()
    {
        return $this->belongsTo(FamiliesTypes::class,'family_type_id','id');
    }

    /**
     * @return bool|null
     * @throws Exception
     */
    public function deleteHasRelations()
    {
        //delete all hasMany and hasOne data that related to the Major data deleted
        $this->familiesExclusiveInfo()->delete();
        $this->exceptionalFamilies()->delete();
        $this->lebaneseFamilies()->delete();
        $this->syrianFamilies()->delete();
        $this->childrenInfo()->delete();
        $this->appointments()->delete();

        return parent::delete();
    }
    public function appointments()
    {
        return $this->hasMany('App\Appointments','family_id','id')->where('next_appointment','>', Carbon::now());
    }
    public function deleteAppointment($nextAppointment)
    {
        $this->appointments()->where('next_appointment',$nextAppointment)->delete();
    }

    /**
     * below methods are necessary to use create method because the past methods are pointing only
     * to targeted tables without passing the many to many related tables
     */

    /**
     * insert use
     * @return HasMany
     */
    public function husbandStatuseInsert()
    {
        return $this->HasMany('App\FamiliesHusbandStatuses','family_id','id');
    }

    /**
     * insert use
     * @return HasMany
     */
    public function houseNeedsInsert()
    {
        return $this->HasMany('App\FamiliesHouseNeeds', 'family_id', 'id');
    }

    /**
     * insert use
     * @return HasMany
     */
    public function houseTypesInsert()
    {
        return $this->HasMany('App\FamiliesHouseTypes','family_id','id');
    }

    /**
     * insert use
     * @return HasMany
     */
    public function ngoInfoInsert()
    {
        return $this->HasMany('App\FamiliesNgoRelations',  'family_id','id');
    }


}
