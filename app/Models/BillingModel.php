<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingModel extends Model
{
    use HasFactory;
    
    protected $table = 'billings';

    public $incrementing = false;

    protected $fillable = [
        'invoice_date',
        'due_date',
        'payment_date',
        'id_gym_member',
        'active'
    ];

    public function gym_member() {
        return $this->belongsTo(GymMemberModel::class, 'id_gym_member');
    }
}
