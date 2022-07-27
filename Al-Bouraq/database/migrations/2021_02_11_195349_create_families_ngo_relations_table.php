<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesNgoRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families_ngo_relations', function (Blueprint $table) {
            $table->id();
            $table->integer('family_id');
            $table->integer('ngo_id');
            $table->integer('child_aid_amount')->nullable();
            $table->integer('total_aid_amount')->nullable();
            $table->integer('ramadan_additional_aid')->nullable();
            $table->string('monthly_warranty')->nullable();

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
        Schema::dropIfExists('families_ngo_relations');
    }
}
