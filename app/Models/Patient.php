<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

     protected $fillable = [
        'patient_id',
        'patient_full_name',
        'patient_gender',
        'patient_role',
        'patient_year',
        'patient_department',
        'patient_phone_number',
        'patient_consult_date',
        'patient_consult_time',
        'patient_medical_comments',
     ];
}
