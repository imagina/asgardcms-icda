<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinAndInvoiceNumFieldsInspectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('icda__inspections', function (Blueprint $table) {
        $table->bigInteger('invoice_num')->nullable();
        $table->bigInteger('pin_num')->nullable();
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
