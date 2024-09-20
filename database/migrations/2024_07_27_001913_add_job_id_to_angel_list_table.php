<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJobIdToAngelListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('angel_list', function (Blueprint $table) {
            $table->integer('job_id')->nullable()->after('teacher_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('angel_list', function (Blueprint $table) {
            $table->dropColumn('job_id');
        });
    }
}
