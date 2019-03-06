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
            $table->integer('types_vehicles_id')->unsigned();
            $table->foreign('types_vehicles_id')->references('id')->on('icda__types_vehicles');
            $table->integer('types_fuels_id')->unsigned();
            $table->foreign('types_fuels_id')->references('id')->on('icda__types_fuels');
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
            $table->enum('weight',['heavy','light']);//Peso pesado,ligero
            $table->date('insurance_expedition')->nullable();//fecha expedición seguro
            $table->date('insurance_expiration')->nullable();//fecha vencimiento seguro
            $table->string('gas_certificate')->nullable();//Certificado de gas
            $table->string('gas_certifier')->nullable();//Certificador
            $table->date('gas_certificate_expiration')->nullable();//Expiración certificado de gas
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
