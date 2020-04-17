<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGpsTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gps_tables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("order_id");
            $table->string("user_lat")->nullable();
            $table->string("user_long")->nullable();
            $table->string("delivery_lat")->nullable();
            $table->string("delivery_long")->nullable();
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
        Schema::dropIfExists('gps_tables');
    }
}
