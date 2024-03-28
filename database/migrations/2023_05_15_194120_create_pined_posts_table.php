<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePinedPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pined_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('post_id')->nullable();
            $table->string('user_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pined_posts');
    }
}
