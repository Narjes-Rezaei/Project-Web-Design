<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name'
    ];



    function users(){
        return $this->belongsToMany(User::class,'permission_user','user_id','permission_id');
    }

    function roles(){
        return $this->belongsToMany(Role::class,'role_permission','permission_id','role_id');
    }
}
