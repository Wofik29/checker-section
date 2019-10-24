<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('group_id')->index();
            $table->unsignedInteger('office_id')->index();

            $table->foreign('group_id')->on('groups')->references('number');
            $table->foreign('office_id')->on('offices')->references('number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offices_groups');
    }
}
