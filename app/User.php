<?php

namespace App;

use App\Models\Suppliers;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function permissions(){
        return $this->belongsToMany('App\Models\Permissions','users_permissions','user_id','permission_id');
    }

    //check role in route
    public function hasAnyRole($permissions){
//        can be variable or array
        if (is_array($permissions)){

            foreach ($permissions as $permission){
                if ($this->hasRole($permission)){
                    return true;
                }
            }
        }else{
            if ($this->hasRole($permissions)){
                return true;
            }
        }
    }

    public function hasRole($permission){
if ($this->permissions->contains('name',$permission)){
    return true;
}
return false;
    }

    public function hasAccess($access)
    {
        if (Auth::user()) {
            if ((Auth::user()->permissions->contains('name', 'suppliers') || Auth::user()->permissions->contains('name', 'customer') || Auth::user()->permissions->contains('name', 'employees')) && (Auth::user()->permissions->contains($access, 1))) {
                return true;
            }
        } else {
            if (($this->permissions->contains('name', 'visitor')) && ($this->permissions->contains($access, 1))) {
                return true;
            }
        }

        return false;

    }
    public function getsuppliers()
    {
        return $this->hasMany(Suppliers::class, 'user_id');
    }
}
