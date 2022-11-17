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
        Schema::create('user_patients', function (Blueprint $table) {
            $table->id();
            $table->string('user_patient_id');
            $table->string('user_patient_role');
            $table->string('user_patient_first_name');
            $table->string('user_patient_middle_name')->nullable();
            $table->string('user_patient_last_name');
            $table->string('user_patient_suffix')->nullable();
            $table->string('user_patient_gender');
            $table->string('user_patient_birthday');
            $table->string('user_year_department_role');
            $table->string('user_patient_blood_type')->nullable();
            // $table->string('user_patient_medical_history')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('contact_person')->nullable();
            $table->bigInteger('patient_phone_number');
            // medical history
            $table->longText('history_of_past_illness')->nullable();
            $table->longText('past_illness')->nullable();
            $table->longText('operations_and_hospitalizations')->nullable();
            $table->longText('immunization_history')->nullable();
            $table->longText('social_and_environmental_history')->nullable();
            $table->longText('obstetrics_gynecological_history')->nullable(); // for female only
            // physical examination (checkboxesadmin.clinic@psu.edu)
            $table->boolean('general_survey')->default(0)->nullable();
            $table->boolean('skin')->default(0)->nullable();
            $table->boolean('heent')->default(0)->nullable();
            $table->boolean('chest_and_lungs')->default(0)->nullable();
            $table->boolean('heart')->default(0)->nullable();
            $table->boolean('abdomen')->default(0)->nullable();
            $table->boolean('genitourinary')->default(0)->nullable();
            $table->boolean('musculoskeletal')->default(0)->nullable();
            // neurological examination
            $table->boolean('mental_status')->default(0)->nullable();
            $table->boolean('coordination_and_balance')->default(0)->nullable();
            $table->boolean('reflexes')->default(0)->nullable();
            $table->boolean('sensation')->default(0)->nullable();
            $table->boolean('cranial_nerves')->default(0)->nullable();
            $table->boolean('autonomic_nervous_system_nerves')->default(0)->nullable();
            $table->longText('neurological_examination')->nullable(); // others
            // laboratory results
            $table->string('urine')->nullable();
            $table->string('urine_comment')->nullable();
            $table->string('complete_blood_count')->nullable();
            $table->string('complete_blood_count_comment')->nullable();
            $table->string('x_ray')->nullable();
            $table->string('x_ray_comment')->nullable();
            $table->longText('laboratory_results')->nullable(); // others
            // assestment
            $table->longText('assestment')->nullable();
            // university physician
            $table->string('university_physician');
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
        Schema::dropIfExists('user_patients');
    }
};
