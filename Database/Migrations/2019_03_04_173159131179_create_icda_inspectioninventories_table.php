<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcdaInspectionInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icda__inspectioninventories', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('evaluation',['B','R','M','NA']);//B,R,M,NA
            $table->integer('quantity');
            $table->integer('inspections_id')->unsigned();
            $table->foreign('inspections_id')->references('id')->on('icda__inspections');
            $table->integer('inventory_id')->unsigned();
            $table->foreign('inventory_id')->references('id')->on('icda__inventories');
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
        Schema::dropIfExists('icda__inspectioninventories');
    }
}
