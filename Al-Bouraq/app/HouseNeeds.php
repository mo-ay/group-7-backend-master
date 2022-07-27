<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HouseNeeds extends Model
{
    //
    protected $table = "house_needs";

    protected $fillable = [
        'house_need_name',

    ];
    // public function family()
    // {
    //     return $this->BelongsToMany('App\Families', 'families_house_Needs', 'house_need_id', 'id');
    // }

}
