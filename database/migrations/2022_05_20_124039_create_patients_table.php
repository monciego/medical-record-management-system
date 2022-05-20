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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->string('patient_full_name');
            $table->string('patient_gender');
            $table->string('patient_role');
            $table->string('patient_year')->nullable();
            $table->string('patient_department')->nullable();
            $table->bigInteger('patient_phone_number');
            $table->date('patient_consult_date');
            $table->string('patient_consult_time');
            $table->string('patient_medical_comments');
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
        Schema::dropIfExists('patients');
    }
};
