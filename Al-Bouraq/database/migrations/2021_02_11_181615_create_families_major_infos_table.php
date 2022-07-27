<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesMajorInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families_major_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('family_type_id')->unsigned()->nullable();
            $table->string('interviewer')->nullable();
            $table->string('family_name')->nullable();
            $table->date('survey_date')->nullable();
            $table->integer('phone_number')->nullable();
            $table->string('area')->nullable();
            $table->string('husband_name')->nullable();
            $table->string('husband_nationality')->nullable();
            $table->string('husband_idimage')->nullable();
            $table->date('husband_date_of_birth')->nullable();
            $table->string('wife_nationality')->nullable();
            $table->string('wife_marital_status')->nullable();
            $table->date('wife_date_of_birth')->nullable();
            $table->string('wife_profession')->nullable();
            $table->integer('wife_income')->nullable();
            $table->string('family_full_address')->nullable();
            $table->integer('number_of_residents')->nullable();
            $table->string('living_with')->nullable();
            $table->boolean('existing_medical_conditions')->nullable();
            $table->string('medical_condition_name')->nullable();
            $table->string('health_risk_persons')->nullable();
            $table->string('doctor_name')->nullable();
            $table->string('medication_name')->nullable();
            $table->integer('medication_price')->nullable();
            $table->string('code')->nullable();
            $table->integer('parent_id')->nullable();
            $table->boolean('recent')->nullable();

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
        Schema::dropIfExists('families_major_infos');
    }
}
