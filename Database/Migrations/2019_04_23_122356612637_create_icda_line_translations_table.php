<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcdaLineTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icda__line_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('line_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['line_id', 'locale']);
            $table->foreign('line_id')->references('id')->on('icda__lines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('icda__line_translations', function (Blueprint $table) {
            $table->dropForeign(['line_id']);
        });
        Schema::dropIfExists('icda__line_translations');
    }
}
