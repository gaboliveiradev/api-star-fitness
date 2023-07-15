<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    use HasFactory;

    protected $table = 'employees';

    public $incrementing = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'document',
        'cref',
        'birthday',
        'observation',
        'id_address',
        'active'
    ];

    public function address() {
        return $this->belongsTo(AddressModel::class, 'id_address');
    }

    public function access_group_employee_assoc() {
        return $this->hasMany(AccessGroupEmployeeModel::class, 'id_employee');
    }
}
