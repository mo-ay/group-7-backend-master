<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    //
    protected $table = 'donations';

    protected $fillable = [
        'name',
        'source_type',
        'source_name',

    ];

}
