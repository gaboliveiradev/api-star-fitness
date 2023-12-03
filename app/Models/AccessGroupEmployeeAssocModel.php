<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessGroupEmployeeAssocModel extends Model
{
    use HasFactory;

    protected $table = 'access_groups_employees_assoc';

    protected $fillable = [
        'id_access_group',
        'id_employee',
        'active'
    ];

    public function employee() {
        return $this->belongsTo(EmployeeModel::class, 'id_employee');
    }

    public function access_group() {
        return $this->belongsTo(AccessGroupModel::class, 'id_access_group');
    }
}
