<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessGroupModel extends Model
{
    use HasFactory;

    protected $table = 'access_groups';

    protected $fillable = [
        'name',
        'abilities',
        'active'
    ];

    public function access_group_employee_assoc() {
        return $this->hasMany(AccessGroupEmployeeAssocModel::class, 'id_access_group');
    }
}
