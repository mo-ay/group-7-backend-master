<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamiliesTypes extends Model
{
    //
    protected $table = "families_types";

    protected $fillable = [
        'family_type',
    ];

    public function familiesMajorInfo()
    {
        return $this->hasMany('App\FamiliesMajorInfo','family_type_id','id');
    }
}
