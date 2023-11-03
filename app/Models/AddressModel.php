<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressModel extends Model
{
    use HasFactory;

    protected $table = 'adresses';

    public $incrementing = false;

    protected $fillable = [
        'street',
        'district',
        'number',
        'zip_code',
        'city',
        'state',
        'active'
    ];

    public function employee() {
        return $this->hasMany(EmployeeModel::class, 'id_address');
    }

    public function gym_member() {
        return $this->hasMany(GymMemberModel::class, 'id_address');
    }
}
