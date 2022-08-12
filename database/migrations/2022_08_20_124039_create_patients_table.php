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
            $table->foreignId('user_patient_id')
                ->constrained('user_patients')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('patient_consult_date');
            $table->string('patient_consult_time');
            $table->longText('complaints');
            $table->longText('diagnosis');
            $table->string('patient_medical_comments')->nullable();
            $table->string('patient_prescribed_medicine')->nullable();
            $table->string('patient_prescribed_medicine_quantity')->nullable();
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
