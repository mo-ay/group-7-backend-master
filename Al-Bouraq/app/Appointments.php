<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $table = "appointments";

    protected $fillable = [
        'family_id',
        'next_appointment',
        ];
}
