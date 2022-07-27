<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LebaneseFamilies extends Model
{
    //
    protected $table = "lebanese_families";

    protected $fillable = [
        'family_id',
        'husband_profession',
        'husband_income',
        'husband_assets',
        'husband_debt',
        'husband_debt_amount',
        'husband_debt_desc',
        'husband_shoe_size',
        'wife_gold_assets',
        'wife_gold_quantity',
        'wife_gold_assets_desc',
        'gold_retain_desc',
        'wife_other_assets',
        'wife_other_assets_value',
        'existing_car',
        'car_desc',
        'car_owner',

    ];
}
