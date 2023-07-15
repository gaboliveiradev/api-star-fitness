<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessGroupModel extends Model
{
    use HasFactory;

    protected $table = 'access_groups';

    public $incrementing = false;

    protected $fillable = [
        'name',
        'active'
    ];

    public function access_group_permission_assoc() {
        return $this->hasMany(AccessGroupPermissionAssocModel::class, 'id_access_group');
    }

    public function access_group_employee_assoc() {
        return $this->hasMany(AccessGroupEmployeeModel::class, 'id_access_group');
    }
}
