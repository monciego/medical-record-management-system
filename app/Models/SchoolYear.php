<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_year'
    ];

    public function patient_information () {
        return $this->hasOne(Patient::class);
    }

    public function examination_report () {
        return $this->hasOne(ExaminationReport::class);
    }
}
