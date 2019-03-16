<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcdaInspectionHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icda__inspectionhistories', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('inspections_id')->unsigned();
          $table->foreign('inspections_id')->references('id')->on('icda__inspections')->onDelete('restrict');
          $table->tinyInteger('status')->default(0)->unsigned();
          $table->integer('notify')->default(0)->unsigned();
          $table->text('comment')->default('')->nullable();
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
        Schema::dropIfExists('icda__inspectionhistories');
    }
}
