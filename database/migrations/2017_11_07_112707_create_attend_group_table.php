<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attend_group', function (Blueprint $table) {
            $table->integer('userid')->unsigned();
            $table->integer('groupid')->unsigned();
            $table->primary(['userid', 'groupid']);
            $table->dateTime('attend_time');
            $table->foreign('userid')->references('userid')->on('user');
            $table->foreign('groupid')->references('groupid')->on('group');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attend_group');
    }
}
