<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExceptionalFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exceptional_families', function (Blueprint $table) {
            $table->id();
            $table->string('wife_name')->nullable();
            $table->string('wife_father_name')->nullable();
            $table->string('wife_sur_name')->nullable();
            $table->integer('children_number')->nullable();
            $table->string('husband_profession')->nullable();
            $table->integer('husband_income')->nullable();
            $table->string('distribution_point')->nullable();
            $table->boolean('other_aid')->nullable();
            $table->string('other_aid_description')->nullable();
            $table->integer('smokers_in_house')->nullable();
            $table->string('family_comment')->nullable();
            $table->integer('family_id');
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
        Schema::dropIfExists('exceptional_families');
    }
}
