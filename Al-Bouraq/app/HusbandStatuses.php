<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class HusbandStatuses extends Model
{
    //
    protected $table = "husband_statuses";

    protected $fillable = [
        'husband_status_name',

    ];

    /**
     * The families  that belong to the husband status.
     * @return BelongsToMany
     */
    public function families(): BelongsToMany
    {
        return $this->belongsToMany('App\FamiliesMajorInfo','families_husband_statuses','husband_status_id','id');
    }
}
