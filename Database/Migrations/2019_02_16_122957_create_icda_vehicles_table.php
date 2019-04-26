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
            $table->string('service_type')->nullable();//Tipo de servicio
            $table->string('type_vehicle')->nullable();//AUTOMOVIL,Motocicleta
            $table->string('type_fuel')->nullable();
            $table->string('brand_id')->nullable();
            $table->string('line_id')->nullable();
            $table->string('model')->nullable();
            $table->string('color_id')->nullable();
            $table->string('transit_license')->nullable();//Licencia de transito
            $table->date('enrollment_date')->nullable();//fecha de matrícula
            $table->string('board');//Placa
            $table->string('chasis_number')->nullable();//Número de chasis
            $table->string('vin_number')->nullable();//Número de vin
            $table->string('engine_number')->nullable();//Número de motor
            $table->string('displacement')->nullable();//Cilindraje
            $table->integer('axes_number')->nullable();//Número de ejes
            $table->date('insurance_expedition')->nullable();//fecha expedición seguro
            $table->date('insurance_expiration')->nullable();//fecha vencimiento seguro
            $table->date('tecnomecanica_expedition')->nullable();//fecha expedición tecnomecanica
            $table->date('tecnomecanica_expiration')->nullable();//fecha vencimiento tecnomecanica
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
