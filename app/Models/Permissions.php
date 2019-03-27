<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $table='permission';
    //
    public function users(){
        return $this->belongsToMany('App\User', 'users_permissions', 'permission_id', 'user_id')->withPivot('id', 'permission_id', 'user_id');
    }
}
