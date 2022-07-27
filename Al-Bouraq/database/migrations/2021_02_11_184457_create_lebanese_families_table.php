<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLebaneseFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lebanese_families', function (Blueprint $table) {
            $table->id();
            $table->string('husband_profession')->nullable();
            $table->integer('husband_income')->nullable();
            $table->string('husband_assets')->nullable();
            $table->boolean('husband_debt')->nullable();
            $table->integer('husband_debt_amount')->nullable();
            $table->string('husband_debt_desc')->nullable();
            $table->integer('husband_shoe_size')->nullable();
            $table->boolean('wife_gold_assets')->nullable();
            $table->integer('wife_gold_quantity')->nullable();
            $table->string('wife_gold_assets_desc')->nullable();
            $table->string('gold_retain_desc')->nullable();
            $table->string('wife_other_assets')->nullable();
            $table->integer('wife_other_assets_value')->nullable();
            $table->boolean('existing_car')->nullable();
            $table->string('car_desc')->nullable();
            $table->string('car_owner')->nullable();
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
        Schema::dropIfExists('lebanese_families');
    }
}
