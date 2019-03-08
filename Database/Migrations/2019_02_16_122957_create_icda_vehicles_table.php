<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcdaVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icda__vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_type');//Tipo de servicio
            $table->string('type_vehicle');//AUTOMOVIL,Motocicleta
            $table->string('type_fuel');
            $table->string('brand');
            $table->string('line');
            $table->string('model');
            $table->string('color');
            $table->string('transit_license');//Licencia de transito
            $table->date('enrollment_date');//fecha de matrícula
            $table->string('board');//Placa
            $table->string('chasis_number');//Número de chasis
            $table->string('engine_number');//Número de motor
            $table->string('displacement');//Cilindraje
            $table->integer('axes_number')->nullable();//Número de ejes
            $table->date('insurance_expedition')->nullable();//fecha expedición seguro
            $table->date('insurance_expiration')->nullable();//fecha vencimiento seguro
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
        Schema::dropIfExists('icda__vehicles');
    }
}
