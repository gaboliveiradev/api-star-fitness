<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    use HasFactory;

    protected $table = 'payments';

    public $incrementing = false;

    protected $fillable = [
        'id_billing',
        'payment_method',
        'active'
    ];

    public function billing() {
        return $this->belongsTo(BillingModel::class, 'id_billing');
    }
}
