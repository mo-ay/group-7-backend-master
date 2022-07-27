<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SyrianFamilies extends Model
{
    //
    protected $table = "syrian_families";

    protected $fillable = [
        'family_id',
        'wife_in_lebanon_since',
        'wife_un_number',
        'sponsored_since',
        'wife_migration_request',
        'wife_migration_request_image',
        'family_debt',
        'family_debt_amount',
        'family_debt_desc',

    ];
}
