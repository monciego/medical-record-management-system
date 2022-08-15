<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examination_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_patient_id')
                ->constrained('user_patients')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            // checkbox
            $table->boolean('pre_employment')->default(0)->nullable();
            $table->boolean('annual')->default(0)->nullable();
            $table->boolean('ojt')->default(0)->nullable();
            // basic information
            $table->date('date_of_examination');
            $table->string('address')->nullable();
            // medical history
            $table->longText('present_symptoms')->nullable();
            $table->longText('past_medical_history')->nullable();
            $table->longText('family_medical_history')->nullable();
            $table->longText('history_of_operations')->nullable();
            $table->longText('allergies')->nullable();
            $table->longText('gynecological_obstetrics_history')->nullable();
            $table->longText('personal_social_history')->nullable();
            // physical examination
            /* A */ $table->longText('general_survey')->nullable();
            /* B */ // Vital Signs
            /* B */ $table->string('height')->nullable();
            /* B */ $table->string('weight')->nullable();
            /* B */ $table->string('blood_pressure')->nullable();
            /* B */ $table->string('heart_rate')->nullable();
            /* B */ $table->string('respiratory_rate')->nullable();
            /* B */ $table->string('temperature')->nullable();
            /* C */ $table->longText('skin')->nullable();
            /* D */ $table->longText('heent')->nullable();
            /* E */ $table->longText('chest_and_lungs')->nullable();
            /* F */ $table->longText('heart')->nullable();
            /* G */ $table->longText('abdomen')->nullable();
            /* H */ $table->longText('genitourinary')->nullable();
            /* I */ $table->longText('extremities')->nullable();
            /* J */ $table->longText('neurological')->nullable();
            // Laboratory Results
            $table->string('obo')->nullable();
            $table->string('obo_findings')->nullable();
            $table->string('urinalysis')->nullable();
            $table->string('urinalysis_findings')->nullable();
            $table->string('fecalysis')->nullable();
            $table->string('fecalysis_findings')->nullable();
            $table->string('hbs_ag')->nullable();
            $table->string('hbs_ag_findings')->nullable();
            $table->string('pregnancy_test')->nullable();
            $table->string('pregnancy_test_findings')->nullable();
            $table->string('drug_test')->nullable();
            $table->string('drug_test_findings')->nullable();
            $table->string('chest_xray')->nullable();
            $table->string('chest_xray_findings')->nullable();
            $table->string('ecg')->nullable();
            $table->string('ecg_findings')->nullable();
            /* Others */ $table->longText('others')->nullable();
            // Classification
            $table->boolean('class_a')->default(0)->nullable();
            $table->boolean('class_b')->default(0)->nullable();
            $table->boolean('class_c')->default(0)->nullable();
            $table->longText('pending')->nullable();
            $table->longText('pending_text')->nullable();
            $table->longText('unfit')->nullable();
            $table->longText('unfit_text')->nullable();
            // remarks
            $table->longText('remarks')->nullable();
            // physician
            $table->string('university_physician_examine')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examination_reports');
    }
};
