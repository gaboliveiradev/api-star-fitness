<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'id_billing',
        'payment_method',
        'payment_date',
        'amount',
        'active'
    ];

    public function billing() {
        return $this->belongsTo(BillingModel::class, 'id_billing');
    }
}
