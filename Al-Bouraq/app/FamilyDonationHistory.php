<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyDonationHistory extends Model
{
    //
    protected $table = 'family_donation_histories';

    protected $fillable = [
        'family_id',
        'donation_id',
        'bouraq_donation_value',
        'r_donation_value',
        'h_donation_value',
    ];

}
