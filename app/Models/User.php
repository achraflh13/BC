<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     *
     */
    protected $guarded = [];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


public static function getpermissionGroups(){
    $permission_group = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
    return $permission_group;
}
public static function getpermissionGroupName($group_name){
    $permissions = DB::table('permissions')->select('name','id')->where('group_name',$group_name)->get();
    return $permissions;
}

public static function roleHasPermissions($role, $permissions){
    $hasPermission = true;
    foreach ($permissions as $permission) {
        if (!$role->hasPermissionTo($permission->name)) {
            $hasPermission = false;
             // Optionnel, arrête la boucle dès que l'on trouve une permission manquante
        }
    }
    return $hasPermission;
}

}





