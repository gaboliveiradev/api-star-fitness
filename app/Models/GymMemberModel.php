<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymMemberModel extends Model
{
    use HasFactory;

    protected $table = 'gym_members';

    protected $fillable = [
        'id_person',
        'id_type_enrollment',
        'height_cm',
        'weight_kg',
        'observation',
        'active'
    ];

    public function type() {
        return $this->belongsTo(TypeModel::class, 'id_type_enrollment');
    }

    public function person() {
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
