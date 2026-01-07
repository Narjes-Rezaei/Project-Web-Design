<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    function users(){
        return $this->belongsToMany(User::class,'role_user','role_id','user_id');
    }

    function permissions(){
        return $this->belongsToMany(Permission::class,'role_permission', 'role_id','permission_id');
    }
}
