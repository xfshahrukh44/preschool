<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('childcares', function (Blueprint $table) {
            $table->string('family_discount_offered')->nullable();
            $table->string('family_discount')->nullable();
            $table->string('military_child_care_discount')->nullable();
            $table->string('military_child_discount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('childcares', function (Blueprint $table) {
            //
        });
    }
};
