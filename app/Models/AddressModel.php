<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressModel extends Model
{
    use HasFactory;

    protected $table = 'adresses';

    public $incrementing = false;

    protected $fillable = [
        'street',
        'district',
        'number',
        'zip_code',
        'id_city',
        'active'
    ];

    public function city() {
        // belongsTo: 'pertence a', ou seja o id_city pertence a tabela City
        return $this->belongsTo(CityModel::class, 'id_city');
    }

    public function employee() {
        return $this->hasMany(EmployeeModel::class, 'id_address');
    }
}
