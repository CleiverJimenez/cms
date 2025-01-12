<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory;

    protected $table = 'permissions';

    protected $fillable = ['name', 'guard_name', 'created_at', 'updated_at'];

    // Ya no es necesario definir manualmente la relación con roles
    // El trait HasRoles y HasPermissions del paquete maneja esto automáticamente
}
