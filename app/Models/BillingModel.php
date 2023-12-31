<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingModel extends Model
{
    use HasFactory;
    
    protected $table = 'billings';
    
    protected $fillable = [
        'pay_day',
        'id_type_enrollment',
        'id_gym_member',
        'active'
    ];

    public function type() {
        return $this->belongsTo(GymMemberModel::class, 'id_type_enrollment');
    }
    public function gym_member() {
        return $this->belongsTo(GymMemberModel::class, 'id_gym_member');
    }

    public function payment() {
        return $this->hasMany(PaymentModel::class, 'id_billing');
    }
}
