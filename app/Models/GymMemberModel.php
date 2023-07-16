<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymMemberModel extends Model
{
    use HasFactory;

    protected $table = 'cities';

    public $incrementing = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'document',
        'phone',
        'birthday',
        'gender',
        'height_cm',
        'weight_kg',
        'photo_url',
        'observation',
        'id_enrollment',
        'id_address',
        'active'
    ];

    public function enrollment() {
        return $this->belongsTo(EnrollmentModel::class, 'id_enrollment');
    }

    public function address() {
        return $this->belongsTo(AddressModel::class, 'id_address');
    }

    public function billing() {
        return $this->hasMany(BillingModel::class, 'id_gym_member');
    }
}
