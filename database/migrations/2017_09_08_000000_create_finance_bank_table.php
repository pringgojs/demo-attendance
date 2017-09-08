<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinanceBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance_bank', function (Blueprint $table) {
            $table->increments('id');
            $table->string('form_number');
            $table->integer('raw_number')->unsigned();
            $table->timestamp('form_date');
            $table->string('bank_account');
            $table->string('payment_flow');
            $table->string('notes');
            $table->integer('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finance_bank');
    }
}
