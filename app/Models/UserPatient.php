<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPatient extends Model
{
    use HasFactory;

    public function patient_information () {
        return $this->hasOne(Patient::class);
    }

    protected $fillable = [
        'user_patient_id',
        'user_patient_role',
        'user_patient_full_name',
        'user_patient_gender',
        'user_patient_birthday',
        'user_patient_blood_type',
        'user_patient_medical_history',
        'user_year_department_role',
        'patient_phone_number',
    ];

}
