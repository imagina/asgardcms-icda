<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcdaInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icda__inspections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inspections_types_id')->unsigned();
            $table->foreign('inspections_types_id')->references('id')->on('icda__inspections_types');
            $table->integer('vehicles_id')->unsigned();
            $table->foreign('vehicles_id')->references('id')->on('icda__vehicles');
            $table->boolean('teaching_vehicle');
            $table->integer('mileage');//
            $table->integer('exhosto_diameter')->nullable();//Diametro exhosto
            $table->integer('engine_cylinders')->nullable();//Cilindros motor
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
        Schema::dropIfExists('icda__inspections');
    }
}
