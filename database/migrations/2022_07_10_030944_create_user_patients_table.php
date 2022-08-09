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
            $table->string('user_patient_full_name');
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
            // physical examination (checkboxes)
            $table->boolean('general_survey')->default(0)->nullable();
            $table->boolean('skin')->default(0)->nullable();
            $table->boolean('heent')->default(0)->nullable();
            $table->boolean('chest_and_lungs')->default(0)->nullable();
            $table->boolean('heart')->default(0)->nullable();
            $table->boolean('abdomen')->default(0)->nullable();
            $table->boolean('genitourinary')->default(0)->nullable();
            $table->boolean('musculoskeletal')->default(0)->nullable();
            $table->longText('neurological_examination')->nullable();
            $table->longText('laboratory_results')->nullable();
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
