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
            $table->id('people_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->timestamp('birthday');
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');
            $table->string('description');
            $table->bigInteger('person_status_id')->unsigned();
            $table->bigInteger('parent_info_id')->unsigned();
            $table->bigInteger('position_id')->unsigned();
            $table->bigInteger('gender_id')->unsigned();

            $table->foreign('person_status_id')->references('person_status_id')->on('person_statuses')->onCascade('delete');
            $table->foreign('position_id')->references('position_id')->on('positions')->onCascade('delete');
            $table->foreign('gender_id')->references('gender_id')->on('genders')->onCascade('delete');
            $table->foreign('parent_info_id')->references('parent_info_id')->on('parent_infos')->onCascade('delete');
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
