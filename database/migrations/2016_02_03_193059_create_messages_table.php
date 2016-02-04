<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('locale_id')->unsigned();
            $table->integer('translate_id')->unsigned();
            $table->text('message');
            $table->timestamps();

            $table->foreign('locale_id')->references('id')->on('locales');
            $table->foreign('translate_id')->references('id')->on('translates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('messages');
    }
}
