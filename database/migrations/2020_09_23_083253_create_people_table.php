<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->timestamp('birthday');
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');
            $table->string('description');
            $table->bigInteger('status_id')->unsigned();
            $table->bigInteger('parent_id')->unsigned();
            $table->bigInteger('position_id')->unsigned();
            $table->bigInteger('gender_id')->unsigned();

            $table->foreign('status_id')->references('id')->on('person_statuses')->onCascade('delete');
//            $table->foreign('parent_id')->references('id')->on('parent_infos')->onCascade('delete');
//            $table->foreign('position_id')->references('id')->on('positions')->onCascade('delete');
//            $table->foreign('gender_id')->references('id')->on('genders')->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
