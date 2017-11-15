<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkersTable extends Migration
{
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('birthday');

            $table->integer('gender_id')->unsigned();
            $table->foreign('gender_id')->
            references('id')->
            on('genders')->
            onDelete('cascade');

            $table->string('adress');

            $table->integer('position_id')->unsigned();
            $table->foreign('position_id')->
            references('id')->
            on('positions')->
            onDelete('cascade');

            $table->timestamps();

        });
    }
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
