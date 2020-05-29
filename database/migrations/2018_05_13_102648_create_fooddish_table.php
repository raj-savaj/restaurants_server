<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooddishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food dish', function (Blueprint $table) {
            $table->increments('fd_id');
            $table->string("fd_name");
            $table->integer("fd_Price");
            $table->string("C_name");
            $table->string("fd_image");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food dish');
    }
}
