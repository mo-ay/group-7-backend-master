<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamiliesHusbandStatuses extends Model
{
    //
    protected $table = "families_husband_statuses";

    protected $fillable = [
        'family_id',
        'husband_status_id'
    ];
}
