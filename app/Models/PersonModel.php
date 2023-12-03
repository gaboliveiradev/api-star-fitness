<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PersonModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'persons';
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'document',
        'phone',
        'birthday',
        'gender',
        'photo_url',
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

    public function employee() {
        return $this->hasMany(EmployeeModel::class, 'id_person');
    }

    public function gym_member() {
        return $this->hasMany(GymMemberModel::class, 'id_person');
    }
}
