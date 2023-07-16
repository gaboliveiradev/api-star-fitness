<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollmentModel extends Model
{
    use HasFactory;

    protected $table = 'enrollments';

    public $incrementing = false;

    protected $fillable = [
        'enrollment_date',
        'id_type',
        'active'
    ];

    public function type() {
        return $this->belongsTo(TypeModel::class, 'id_type');
    }
}
