<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class permissions extends Model
{
    //
    public function users(){
        return $this->belongsToMany('App\User','users_permissions','permission_id','user_id');
    }
}
