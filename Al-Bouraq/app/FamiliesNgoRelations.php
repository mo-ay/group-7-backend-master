<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamiliesNgoRelations extends Model
{
    //
    protected $table = "families_ngo_relations";

    protected $fillable = [
        'family_id',
        'ngo_id',
        'child_aid_amount',
        'total_aid_amount',
        'ramadan_additional_aid',
        'monthly_warranty',

    ];
   
    // public function family()
    // {
    //     return $this->belongsTo('App\FamilyMajorInfo');
    // }
    // public function ngo()
    // {
    //     return $this->belongsTo('App\NgoInfo');
    // }
}
