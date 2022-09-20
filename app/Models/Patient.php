<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_patient_id',
        'clinic',
        'patient_consult_date',
        'patient_consult_time',
        'complaints',
        'diagnosis',
        'patient_prescribed_medicine',
        'patient_prescribed_medicine_quantity',
        'patient_medical_comments',
        'physician_name',
     ];

    public function scopeFilter($query, array $filters)
    {
        if($filters['role'] ?? false) {
              $query->where('user_patient_role',  request('role'));
        }
    }
}
