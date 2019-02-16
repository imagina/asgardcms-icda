<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcdaVehiclesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icda__vehicles_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('vehicles_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['vehicles_id', 'locale']);
            $table->foreign('vehicles_id')->references('id')->on('icda__vehicles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('icda__vehicles_translations', function (Blueprint $table) {
            $table->dropForeign(['vehicles_id']);
        });
        Schema::dropIfExists('icda__vehicles_translations');
    }
}
