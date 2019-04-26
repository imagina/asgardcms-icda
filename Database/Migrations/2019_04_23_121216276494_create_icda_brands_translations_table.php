<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcdaBrandsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icda__brands_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields
            $table->string('name');
            $table->integer('brands_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['brands_id', 'locale']);
            $table->foreign('brands_id')->references('id')->on('icda__brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('icda__brands_translations', function (Blueprint $table) {
            $table->dropForeign(['brands_id']);
        });
        Schema::dropIfExists('icda__brands_translations');
    }
}
