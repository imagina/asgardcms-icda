<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSomeFieldsInspectionsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('icda__inspections', function (Blueprint $table) {
      $table->string('type_vehicle');//Pesado,ligero,motocicleta
      $table->string('gas_certificate')->nullable();//Certificado de gas
      $table->string('gas_certifier')->nullable();//Certificador
      $table->date('gas_certificate_expiration')->nullable();//Expiración certificado de gas
      $table->boolean('governor')->nullable();//Gobernador
      $table->boolean('taximeter')->nullable();//Taximetro
      $table->boolean('polarized_glasses')->nullable();//Vidrios polarizados
      $table->boolean('armored_vehicle')->nullable();//Vehiculo blindado
      $table->boolean('modified_engine')->nullable();//Motor modificado
      $table->integer('spare_tires')->nullable();//Llantas de repuesto
      $table->text('observations')->nullable();//Observaciones
      $table->boolean('vehicle_prepared');//Vehiculo preparado para inspección
      $table->boolean('seen_technical_director')->nullable();//Visto bueno director técnico
      $table->text('vehicle_delivery_signature');//Firma de entrega de vehiculo
      $table->text('signature_received_report')->nullable();//Firma de entrega de informe
      $table->text('options')->nullable();//
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {

  }
}
