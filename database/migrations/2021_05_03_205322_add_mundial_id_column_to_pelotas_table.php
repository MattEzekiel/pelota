<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMundialIdColumnToPelotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pelotas', function (Blueprint $table) {
            $table->unsignedBigInteger('mundial_id')->nullable();
            $table->foreign('mundial_id')->references('mundial_id')->on('mundiales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelotas', function (Blueprint $table) {
            $table->dropForeign('mundial_id');
            $table->dropColumn('mundial_id');
        });
    }
}
