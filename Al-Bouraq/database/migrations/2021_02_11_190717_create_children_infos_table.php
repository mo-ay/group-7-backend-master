<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildrenInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children_infos', function (Blueprint $table) {
            $table->id();
            $table->string('child_name');
            $table->string('family_name')->nullable();
            $table->string('child_gender')->nullable();
            $table->date('child_date_of_birth')->nullable();
            $table->string('child_status')->nullable();
            $table->string('child_profession')->nullable();
            $table->string('child_education_level')->nullable();
            $table->integer('child_income')->nullable();
            $table->string('school_name')->nullable();
            $table->integer('school_fees')->nullable();
            $table->integer('educational_aid')->nullable();
            $table->string('child_comment')->nullable();
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
        Schema::dropIfExists('children_infos');
    }
}
