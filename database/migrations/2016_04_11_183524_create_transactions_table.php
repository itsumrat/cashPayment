<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('transactions', function(Blueprint $table) {
                $table->increments('id');
                $table->integer('from');
                $table->integer('to_id');
                $table->string('payment_method');
                $table->decimal('amount',10,2);
                $table->string('status');
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
        Schema::drop('transactions');
    }

}
