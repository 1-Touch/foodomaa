<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration as BaseMigration;

class Migration extends BaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->text('field1');
            $table->text('field2');
            $table->text('field3');
            $table->text('field4');
            $table->text('field5');
            $table->text('field6');
            $table->text('field7');
            $table->text('field8');
            $table->text('field9');
            $table->text('field10');
            $table->text('field11');
            $table->text('field12');
            $table->text('field13');
            $table->text('field14');
            $table->text('field15');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }
}
