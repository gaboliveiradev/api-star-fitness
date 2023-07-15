<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionModel extends Model
{
    use HasFactory;
    
    protected $table = 'permissions';

    public $incrementing = false;

    protected $fillable = [
        'name',
        'active'
    ];

    public function access_group_permission_assoc() {
        return $this->hasMany(AccessGroupPermissionAssocModel::class, 'id_permission');
    }
}
