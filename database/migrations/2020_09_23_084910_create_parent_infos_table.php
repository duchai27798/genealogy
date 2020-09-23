<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mother_id')->unsigned();
            $table->bigInteger('father_id')->unsigned();
            $table->bigInteger('status_id')->unsigned();
            $table->timestamp('wedding_date');
            $table->timestamp('divorce_date');
            $table->string('description');

//            $table->foreign('mother_id')->references('id')->on('people')->onCascade('delete');
//            $table->foreign('father_id')->references('id')->on('people')->onCascade('delete');
//            $table->foreign('status_id')->references('id')->on('parent_statuses')->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parent_infos');
    }
}
