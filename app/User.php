<?php

namespace App;

use App\Models\Employees;
use App\Models\Likes;
use App\Models\MembersManagement;
use App\Models\Orders;
use App\Models\Products_order;
use App\Models\products_permissions;
use App\Models\SharedProduct;
use App\Models\Suppliers;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;
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

    public function gepermissionsproduct()
    {
        return $this->belongsToMany('App\Models\Permissions', 'products_permissions', 'user_id', 'permission_id');
    }

    public function product_permission()
    {
        return $this->hasMany(products_permissions::class, 'user_id', 'id');
    }
//    //check role in route
//    public function hasAnyRole($permissions){
////        can be variable or array
//        if (is_array($permissions)){
//
//            foreach ($permissions as $permission){
//                if ($this->hasRole($permission)){
//                    return true;
//                }
//            }
//        }else{
//            if ($this->hasRole($permissions)){
//                return true;
//            }
//        }
//    }
//
//    public function hasRole($permission){
//if ($this->permissions->contains('name',$permission)){
//    return true;
//}
//return false;
//    }
//
//    public function hasAccess($access)
//    {
//        if (Auth::user()) {
//            if ((Auth::user()->permissions->contains('name', 'suppliers') || Auth::user()->permissions->contains('name', 'customer') || Auth::user()->permissions->contains('name', 'employees')) && (Auth::user()->permissions->contains($access, 1))) {
//                return true;
//            }
//        } else {
//            if (($this->permissions->contains('name', 'visitor')) && ($this->permissions->contains($access, 1))) {
//                return true;
//            }
//        }
//
//        return false;
//
//    }
    public function getsuppliers()
    {
        return $this->hasMany(Suppliers::class, 'user_id');
    }

    public function getShareProduct()
    {
        return $this->hasMany(SharedProduct::class, 'user_id');
    }

    public function getLikes()
    {
        return $this->hasMany(Likes::class, 'user_id');
    }

    public function getProductOrders()
    {
        return $this->hasMany(Products_order::class, 'user_id');
    }

    public function getOrders()
    {
        return $this->hasMany(Orders::class, 'user_id');
    }

    public function getMembersManagement()
    {
        return $this->hasMany(MembersManagement::class, 'user_id', 'id');
    }

    public function getEmployees()
    {
        return $this->hasMany(Employees::class, 'user_id');
    }
}
