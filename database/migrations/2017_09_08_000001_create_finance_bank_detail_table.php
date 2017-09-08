<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinanceBankDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance_bank_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('finance_bank_id')->unsigned()->index('finance_bank_id_index');
            $table->foreign('finance_bank_id', 'finance_bank_id_foreign')
                ->references('id')->on('finance_bank')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->string('account_name');
            $table->string('person_name');
            $table->string('notes');
            $table->decimal('amount', 16, 4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finance_bank_detail');
    }
}
