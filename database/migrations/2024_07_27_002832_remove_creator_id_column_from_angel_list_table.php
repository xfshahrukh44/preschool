<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveCreatorIdColumnFromAngelListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('angel_list', function (Blueprint $table) {
            $table->dropColumn('creator_id');
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
            $table->integer('creator_id')->nullable();
        });
    }
}
