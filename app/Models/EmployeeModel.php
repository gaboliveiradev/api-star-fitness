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
        'id_person',
        'cref',
        'observation',
        'active'
    ];

    public function id_person() {
        return $this->belongsTo(PersonModel::class, 'id_person');
    }

    public function access_group_employee_assoc() {
        return $this->hasMany(AccessGroupEmployeeModel::class, 'id_employee');
    }
}
