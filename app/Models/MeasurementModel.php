<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasurementModel extends Model
{
    use HasFactory;

    protected $table = 'measurements';

    protected $fillable = [
        'chest',
        'glute',
        'left_arm',
        'right_arm',
        'left_calf',
        'right_calf',
        'left_forearm',
        'right_forearm',
        'left_quadriceps',
        'right_quadriceps',
        'id_evolution',
        'active'
    ];

    public function evolution() {
        return $this->belongsTo(EvolutionModel::class, 'id_evolution');
    }
}
