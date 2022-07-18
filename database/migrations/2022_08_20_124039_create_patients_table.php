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
            // $table->unsignedBigInteger('user_patient_id')->nullable();
          $table->unsignedBigInteger('user_p_id');
/*                 $table->foreignId('user_patient_id')
                ->nullable()
                ->constrained('user_patients')
                ->onUpdate('cascade')
                ->onDelete('cascade'); */
            $table->date('patient_consult_date');
            $table->string('patient_consult_time');
            $table->string('patient_medical_comments')->nullable();
            $table->string('patient_prescribed_medicine')->nullable();
            $table->string('patient_prescribed_medicine_quantity')->nullable();
            // $table->foreign('user_patient_id')->references('id')->on('user_patients')
            //  ->onDelete('cascade');
            // $table->foreign('user_patient_id')->references('id')->on('user_patients')->onDelete('cascade');
            $table->timestamps();
        });

          Schema::table('patients', function ($table) {
              $table
            ->foreign('user_p_id')
            ->references('id')
            ->on('user_patients')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
