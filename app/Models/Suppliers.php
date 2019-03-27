<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    //
    protected $table = 'suppliers';

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getproducts()
    {
        return $this->hasMany(Products::class);
    }
//    public function getsystems(){
//        $this->
//    }
}
