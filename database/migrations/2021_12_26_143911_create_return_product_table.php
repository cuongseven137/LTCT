<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('idOrder');
            $table->integer('idProduct');
            $table->string('detail');
            $table->string('photo')->nullable();
            $table->string('return_form');
            $table->string('refund_form')->nullable();
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
        Schema::dropIfExists('return_product');
    }
}
