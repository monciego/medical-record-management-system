<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

     protected $fillable = [
        'id',
        'patient_consult_date',
        'patient_consult_time',
        'patient_medical_comments',
        'patient_prescribed_medicine',
        'patient_prescribed_medicine_quantity'
     ];
}
