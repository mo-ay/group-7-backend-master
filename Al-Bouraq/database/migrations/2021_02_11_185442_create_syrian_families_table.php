<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyrianFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syrian_families', function (Blueprint $table) {
            $table->id();
            $table->date('wife_in_lebanon_since')->nullable();
            $table->string('wife_un_number')->nullable();
            $table->date('sponsored_since')->nullable();
            $table->boolean('wife_migration_request')->nullable();
            $table->string('wife_migration_request_image')->nullable();
            $table->boolean('family_debt')->nullable();
            $table->integer('family_debt_amount')->nullable();
            $table->string('family_debt_desc')->nullable();
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
        Schema::dropIfExists('syrian_families');
    }
}
