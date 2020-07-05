<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementPrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('element_prescriptions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('drug_id')->unsigned();
            $table->foreign('drug_id')->references('id')->on('drugs')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('drug_type_id')->unsigned();
            $table->foreign('drug_type_id')->references('id')->on('drug_types')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('drug_form_id')->unsigned();
            $table->foreign('drug_form_id')->references('id')->on('drug_forms')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('drug_strength_id')->unsigned();
            $table->foreign('drug_strength_id')->references('id')->on('drug_strengths')->onDelete('cascade')->onUpdate('cascade');

            $table->string('size');
            $table->double('price');
            $table->double('handling')->nullable();
            $table->double('margin')->nullable();
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
        Schema::dropIfExists('element_prescriptions');
    }
}
