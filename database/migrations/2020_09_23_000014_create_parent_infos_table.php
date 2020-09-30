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
            $table->id('parent_info_id');
            $table->bigInteger('mother_id')->nullable()->unsigned();
            $table->bigInteger('father_id')->nullable()->unsigned();
            $table->bigInteger('parent_status_id')->nullable()->unsigned();
            $table->timestamp('wedding_date');
            $table->timestamp('divorce_date');
            $table->string('description');
            $table->timestamps();

            $table->foreign('parent_status_id')->references('parent_status_id')->on('parent_statuses')->onCascade('delete');
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
