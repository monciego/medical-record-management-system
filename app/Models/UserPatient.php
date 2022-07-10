<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPatient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_patient_id',
        'user_patient_role',
        'user_patient_full_name',
        'user_patient_gender',
        'user_patient_birthday',
        'user_patient_blood_type',
        'user_patient_medical_history',
        'user_patient_year',
        'user_patient_department',
        'patient_phone_number',
    ];
}
