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
        'school_year_id',
        'semester',
     ];

    public function user_data () {
        return $this->belongsTo(UserPatient::class, 'user_patient_id');
    }

    public function school_year () {
        return $this->belongsTo(SchoolYear::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if($filters['role'] ?? false) {
              $query->where('user_patient_role',  request('role'));
        }

        if($filters['school_year'] ?? false) {
              $query->where('school_year_id',  request('school_year'));
        }

        if($filters['clinic'] ?? false) {
              $query->where('clinic',  request('clinic'));
        }
    }
}
