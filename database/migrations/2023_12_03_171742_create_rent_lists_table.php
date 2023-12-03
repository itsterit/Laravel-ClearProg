<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_lists', function (Blueprint $table) {
            $table->bigIncrements('rent_id');

            $table->bigInteger('rent_user_id')->unsigned();
            $table->string('order_name');
            $table->integer('price');


            $table->foreign('rent_user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rent_lists');
    }
}
