<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('select_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('select_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('select_id')->references('id')->on('selects');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('select_user');
    }
}
