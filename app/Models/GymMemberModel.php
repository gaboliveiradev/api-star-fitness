<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class GymMemberModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'gym_members';
    protected $keyType = 'uuid';

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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
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

    public function workout_routine() {
        return $this->hasMany(WorkoutRoutineModel::class, 'id_gym_member');
    }

    public function evolution() {
        return $this->hasMany(EvolutionModel::class, 'id_gym_member');
    }
}
