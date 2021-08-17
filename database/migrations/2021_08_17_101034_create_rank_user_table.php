<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRankUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rank_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rank_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('rank_id')->references('id')->on('ranks');
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
        Schema::dropIfExists('rank_user');
    }
}
