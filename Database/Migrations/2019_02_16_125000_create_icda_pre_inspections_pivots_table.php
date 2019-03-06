<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcdaPreInspectionsPivotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icda__pre_inspections_pivots', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pre_inspections_id')->unsigned();
            $table->foreign('pre_inspections_id')->references('id')->on('icda__pre_inspections');
            $table->integer('inspections_id')->unsigned();
            $table->foreign('inspections_id')->references('id')->on('icda__inspections');
            $table->string('value');//Value
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
        Schema::dropIfExists('icda__pre_inspections_pivots');
    }
}
