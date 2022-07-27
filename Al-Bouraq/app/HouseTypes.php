<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class HouseTypes extends Model
{
    //
    protected $table = "house_types";

    protected $fillable = [
        'house_type_name',

    ];

    // /**
    //  * The house types the family lives in 
    //  * @return BelongsToMany
    //  */
    // public function family()
    // {
    //     return $this->BelongsToMany('App\Families', 'families_house_types', 'house_type_id', 'id');
    // }
}
