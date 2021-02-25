<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProductDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product_data', function (Blueprint $table) {
            $table->increments('id');

            $table->string('strProductName',50);
            $table->string('strProductDesc',255);
            $table->string('strProductCode',10)->unique();
            $table->dateTime('dtmAdded')->nullable();
            $table->dateTime('dtmDiscontinued')->nullable();

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
        Schema::dropIfExists('tbl_product_data');
    }
}
