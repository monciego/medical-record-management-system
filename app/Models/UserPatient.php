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

    public function examination_reports () {
        return $this->hasOne(ExaminationReport::class);
    }

    protected $fillable = [
        // basic information
        'user_patient_id',
        'user_patient_role',
        'user_patient_first_name',
        'user_patient_middle_name',
        'user_patient_last_name',
        'user_patient_suffix',
        'user_patient_gender',
        'user_patient_birthday',
        'user_year_department_role',
        'user_patient_blood_type',
        'civil_status',
        'nationality',
        'religion',
        'contact_person',
        'patient_phone_number',
        // medical history
        'history_of_past_illness',
        'past_illness',
        'operations_and_hospitalizations',
        'immunization_history',
        'social_and_environmental_history',
        'obstetrics_gynecological_history',
         // physical examination (checkboxes)
        'general_survey',
        'skin',
        'heent',
        'chest_and_lungs',
        'heart',
        'abdomen',
        'genitourinary',
        'musculoskeletal',
        // neurological examination
        'mental_status',
        'coordination_and_balance',
        'reflexes',
        'sensation',
        'cranial_nerves',
        'autonomic_nervous_system_nerves',
        'neurological_examination',
        // textareas
        'laboratory_results',
        'assestment',
         // university physician
        'university_physician',
    ];

    public function scopeFilter($query, array $filters)
    {
        if($filters['role'] ?? false) {
              $query->where('user_patient_role',  request('role'));
        }
    }
}
