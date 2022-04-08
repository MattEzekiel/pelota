<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTorneoIdColumnToPelotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pelotas', function (Blueprint $table) {
            $table->unsignedBigInteger('torneo_id')->nullable();
            $table->foreign('torneo_id')->references('torneo_id')->on('torneos_locales');
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
            $table->dropForeign('torneo_id');
            $table->dropColumn('torneo_id');
        });
    }
}
