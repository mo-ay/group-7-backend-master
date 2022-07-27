<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildrenInfo extends Model
{
    //
    protected $table = "children_infos";

    protected $fillable = [
        'family_id',
        'child_name',
        'family_name',
        'child_gender',
        'child_date_of_birth',
        'child_status',
        'child_profession',
        'child_education_level',
        'child_income',
        'school_name',
        'school_fees',
        'educational_aid',
        'child_comment'

    ];

    public function family()
    {
        return $this->belongsTo('App\FamilyMajorInfo');
    }
}
