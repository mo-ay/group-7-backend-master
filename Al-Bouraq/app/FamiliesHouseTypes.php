<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamiliesHouseTypes extends Model
{
    //
    protected $table = "families_house_types";

    protected $fillable = [
        'family_id',
        'house_type_id'
    ];
}
