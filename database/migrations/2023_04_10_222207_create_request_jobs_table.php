<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRequestJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->string('job_title')->nullable();
            $table->string('job_type')->nullable();
            $table->string('location')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('education')->nullable();
            $table->string('skills')->nullable();
            $table->string('apply_date')->nullable();
            $table->string('about')->nullable();
            $table->string('upload_resume')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('request_jobs');
    }
}
