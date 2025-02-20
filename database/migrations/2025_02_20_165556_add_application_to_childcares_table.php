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
            $table->string('application_registration')->nullable();
            $table->string('diapers')->nullable();
            $table->string('early_drop_off')->nullable();
            $table->string('extended_stay')->nullable();
            $table->string('late_payment')->nullable();
            $table->string('waitingList_registration')->nullable();
            $table->string('late_pick_up')->nullable();
            $table->string('meals_snacks')->nullable();
            $table->string('returned_check')->nullable();
            $table->string('credit_card_declined')->nullable();
            $table->string('supplies_materials')->nullable();
            $table->string('other')->nullable();
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
