<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExceptionalFamilies extends Model
{
    //
    public $timestamps = false;
    protected $table = "exceptional_families";

    protected $fillable = [
        'wife_name',
        'wife_father_name',
        'wife_sur_name',
        'children_number',
        'husband_profession',
        'husband_income',
        'distribution_point',
        'other_aid',
        'other_aid_description',
        'smokers_in_house',
        'family_comment',
        'family_id'

    ];
    // public function family()
    // {
    //     return $this->belongsTo('App\FamilyMajorInfo');
    // }
}
