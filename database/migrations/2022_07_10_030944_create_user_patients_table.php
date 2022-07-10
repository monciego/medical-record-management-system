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
            $table->string('user_patient_blood_type')->nullable();
            $table->string('user_patient_medical_history')->nullable();
            $table->string('user_patient_year')->nullable();
            $table->string('user_patient_department')->nullable();
            $table->bigInteger('patient_phone_number');
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
