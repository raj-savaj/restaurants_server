<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('norder', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("Tb_no");
            $table->integer("It_id");
            $table->integer("Qty");
            $table->integer("Status");
            $table->integer("Serve")->default('0');;
            $table->string("oid")->default('0');;
            $table->dateTime("Time")->default(DB::raw("CURRENT_TIMESTAMP"));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('norder');
    }
}
