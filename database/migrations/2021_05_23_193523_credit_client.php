<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreditClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->float('credit_amount')->unique();
            $table->date('credit_date')->default(date("Y-m-d H:i:s"));
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('order_id');
            $table->foreign('client_id')->references('id')->on('clients');
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
        //
    }
}