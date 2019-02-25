<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcdaPreInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icda__pre_inspections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');//boolean,select
            $table->string('values')->nullable();//Options ,if type is select
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
        Schema::dropIfExists('icda__pre_inspections');
    }
}
