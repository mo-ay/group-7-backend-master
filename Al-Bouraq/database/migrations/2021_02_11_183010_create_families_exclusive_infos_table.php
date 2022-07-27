<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesExclusiveInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families_exclusive_infos', function (Blueprint $table) {
            $table->id();
            $table->string('wife_name')->nullable();
            $table->boolean('wife_work_need')->nullable();
            $table->string('wife_work_need_desc')->nullable();
            $table->string('wife_education_level')->nullable();
            $table->string('wife_clothes_type')->nullable();
            $table->integer('wife_clothes_size')->nullable();
            $table->integer('wife_shoe_size')->nullable();
            $table->string('house_condition')->nullable();
            $table->integer('house_value')->nullable();
            $table->string('rent_contributor')->nullable();
            $table->integer('electricity_bill')->nullable();
            $table->integer('water_bill')->nullable();
            $table->integer('internet_bill')->nullable();
            $table->integer('generator_bill')->nullable();
            $table->integer('pending_bills')->nullable();
            $table->string('distribution_point')->nullable();
            $table->integer('smokers_in_house')->nullable();
            $table->string('medication_sponsor')->nullable();
            $table->integer('medication_sponsor_amount')->nullable();
            $table->string('family_comment')->nullable();
            $table->integer('family_id');
            //---------------------physical relation with the main table (families_major_info)--------------------//
            //$table->foreignId('family_id')->references('id')->on('families_major_infos');

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
        Schema::dropIfExists('families_exclusive_infos');
    }
}
