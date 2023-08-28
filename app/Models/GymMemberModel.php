<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymMemberModel extends Model
{
    use HasFactory;

    protected $table = 'gym_members';

    public $incrementing = false;

    protected $fillable = [
        'id_person',
        'height_cm',
        'weight_kg',
        'observation',
        'id_enrollment',
        'active'
    ];

    public function enrollment() {
        return $this->belongsTo(EnrollmentModel::class, 'id_enrollment');
    }

    public function id_person() {
        return $this->belongsTo(PersonModel::class, 'id_person');
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
