<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcdaColorTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icda__color_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('color_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['color_id', 'locale']);
            $table->foreign('color_id')->references('id')->on('icda__colors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('icda__color_translations', function (Blueprint $table) {
            $table->dropForeign(['color_id']);
        });
        Schema::dropIfExists('icda__color_translations');
    }
}
