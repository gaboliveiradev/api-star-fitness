<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeModel extends Model
{
    use HasFactory;

    protected $table = 'types';

    public $incrementing = false;

    protected $fillable = [
        'name',
        'number_of_days',
        'price',
        'active'
    ];

    public function billing() {
        return $this->hasMany(BillingModel::class, 'id_type_enrollment');
    }

    public function gym_member() {
        return $this->hasMany(GymMemberModel::class, 'id_type_enrollment');
    }
}
