<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExaminationReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_patient_id',
        // checkbox
        'pre_employment',
        'annual',
        'ojt',
        // basic information
        'date_of_examination',
        'address',
        // medical history
        'present_symptoms',
        'past_medical_history',
        'family_medical_history',
        'history_of_operations',
        'allergies',
        'gynecological_obstetrics_history',
        'personal_social_history',
        // physical examination
        'general_survey',
        'height',
        'weight',
        'blood_pressure',
        'heart_rate',
        'respiratory_rate',
        'temperature',
        'skin',
        'heent',
        'chest_and_lungs',
        'heart',
        'abdomen',
        'genitourinary',
        'extremities',
        'neurological',
        // lab results
        'obo',
        'obo_findings',
        'urinalysis',
        'urinalysis_findings',
        'fecalysis',
        'fecalysis_findings',
        'hbs_ag',
        'hbs_ag_findings',
        'pregnancy_test',
        'pregnancy_test_findings',
        'drug_test',
        'drug_test_findings',
        'chest_xray',
        'chest_xray_findings',
        'ecg',
        'ecg_findings',
        'others',
        // classification
        'class_a',
        'class_b',
        'class_c',
        'pending',
        'pending_text',
        'unfit',
        'unfit_text',
        //remarks
        'remarks',
        // university physician
        'university_physician_examine',
    ];
}
