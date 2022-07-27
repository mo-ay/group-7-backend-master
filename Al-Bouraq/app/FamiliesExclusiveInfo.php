<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamiliesExclusiveInfo extends Model
{
    //
    protected $table = "families_exclusive_infos";

    protected $fillable = [
        'family_id',
        'wife_name',
        'wife_work_need',
        'wife_work_need_desc',
        'wife_education_level',
        'wife_clothes_type',
        'wife_clothes_size',
        'wife_shoe_size',
        'house_condition',
        'house_value',
        'rent_contributor',
        'electricity_bill',
        'water_bill',
        'internet_bill',
        'generator_bill',
        'pending_bills',
        'distribution_point',
        'smokers_in_house',
        'medication_sponsor',
        'medication_sponsor_amount',
        'family_comment',

    ];

    // public function family()
    // {
    //     return $this->belongsTo('App\FamilyMajorInfo');
    // }
}
