<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamiliesHouseNeeds extends Model
{
    //
    protected $table = "families_house_needs";

    protected $fillable = [
        'family_id',
        'house_need_id'
    ];
}
