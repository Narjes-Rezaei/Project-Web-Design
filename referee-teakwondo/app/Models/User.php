<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'family',
        'phone',
        'email',
        'super_user',
        'staff',
        'password',
        'photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_user', 'user_id', 'permission_id');
    }

    function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    function isSuperUser()
    {
        if ($this->super_user == 1) return true;
        else return false;
    }

    function isStaff()
    {
        if ($this->staff == 1) return true;
        else return false;
    }


    public function hasRole($roleName)
    {
        return $this->roles->contains('name', $roleName);
    }

    public function hasPermission($permissionName)
    {
        if ($this->isSuperUser()) {
            return true;
        }
        $this->loadMissing(['permissions', 'roles.permissions']);

        if ($this->permissions->contains('name', $permissionName)) {
            return true;
        }

        foreach ($this->roles as $role) {
            if ($role->permissions->contains('name', $permissionName)) {
                return true;
            }
        }

        return false;
    }
}
