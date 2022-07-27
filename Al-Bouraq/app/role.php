<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class role extends Model
{
    //
    protected $table='role';
    protected $fillable =[
        'role_name',
    ];

    /**
     * @return HasMany
     */
    public function user(){
       return $this->hasMany('App\User','role_id','id');
    }
}
