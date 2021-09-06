<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
           // $table->bigIncrements('id');
          //  $table->increments('id');
            //$table->string('name');
            //$table->string('autor');
            //$table->bigInteger('type_id')->unsigned();
            //$table->foreign('type_id')->references('id')->on('type');
            //$table->bigInteger('category_id')->unsigned();
            //$table->foreign('category_id')->references('id')->on('category');
            //$table->timestamps();
            $table->increments('id');
            $table->string('name');
            $table->bigInteger('book_id')->unsigned();
            $table->foreign('book_id')->references('id')->on('books');

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
        Schema::dropIfExists('records');
    }
}
