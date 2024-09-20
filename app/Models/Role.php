<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Traits\HasRoles;

class Role extends Model
{
    use HasFactory;
    use HasRoles;
    protected $guarded = [];
    public function permissions()
{
    return $this->belongsToMany(ModelsPermission::class, 'role_has_permissions', 'role_id', 'permission_id');
}

}

