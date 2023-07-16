<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    use HasFactory;

    protected $table = 'cities';

    public $incrementing = false;

    protected $fillable = [
        'name',
        'state',
        'active'
    ];

    public function address() {
        // hasMany: Relação de um para muitos.
        return $this->hasMany(AddressModel::class, 'id_city');
    }
}
