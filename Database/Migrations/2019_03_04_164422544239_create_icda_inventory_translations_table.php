<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcdaInventoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icda__inventory_translations', function (Blueprint $table) {
            $table->increments('id');
            // Your translatable fields
            $table->string('name');
            $table->integer('inventory_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['inventory_id', 'locale']);
            $table->foreign('inventory_id')->references('id')->on('icda__inventories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('icda__inventory_translations', function (Blueprint $table) {
            $table->dropForeign(['inventory_id']);
        });
        Schema::dropIfExists('icda__inventory_translations');
    }
}
