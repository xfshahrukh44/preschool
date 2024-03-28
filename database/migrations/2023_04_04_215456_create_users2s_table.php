<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsers2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users2s', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('lname')->nullable();
            $table->string('role')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('current_position')->nullable();
            $table->string('year_of_experience')->nullable();
            $table->string('age_worked_with')->nullable();
            $table->string('about')->nullable();
            $table->string('hour_open')->nullable();
            $table->string('age_accepted')->nullable();
            $table->string('position_accepted')->nullable();
            $table->string('about_preschool')->nullable();
            $table->string('status')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users2s');
    }
}
