<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('job_title')->nullable();
            $table->string('job_description')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_description')->nullable();
            $table->string('location')->nullable();
            $table->string('job_type')->nullable();
            $table->string('salary_range')->nullable();
            $table->string('required_education')->nullable();
            $table->string('skills')->nullable();
            $table->string('instruction')->nullable();
            $table->string('post_date')->nullable();
            $table->string('due_date')->nullable();
            $table->string('creator_name')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('job_posts');
    }
}
