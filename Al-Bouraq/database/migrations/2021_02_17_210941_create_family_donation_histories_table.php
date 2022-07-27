<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyDonationHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_donation_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('family_id');
            $table->bigInteger('donation_id');
            $table->integer('bouraq_donation_value')->nullable();
            $table->integer('h_donation_value')->nullable();
            $table->integer('r_donation_value')->nullable();
            
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
        Schema::dropIfExists('family_donation_histories');
    }
}
