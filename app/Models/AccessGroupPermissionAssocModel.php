<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessGroupPermissionAssocModel extends Model
{
    use HasFactory;

    protected $table = 'access_groups_permissions_assoc';

    public $incrementing = false;

    protected $fillable = [
        'id_access_group',
        'id_permission',
        'active'
    ];

    public function permission() {
        return $this->belongsTo(PermissionModel::class, 'id_permission');
    }

    public function access_group() {
        return $this->belongsTo(AccessGroupModel::class, 'id_access_group');
    }
}
