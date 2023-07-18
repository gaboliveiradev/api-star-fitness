<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class EmployeeModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'employees';
    protected $keyType = 'uuid';

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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function address() {
        return $this->belongsTo(AddressModel::class, 'id_address');
    }

    public function access_group_employee_assoc() {
        return $this->hasMany(AccessGroupEmployeeModel::class, 'id_employee');
    }
}
