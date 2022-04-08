<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTorneosLocalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneos_locales', function (Blueprint $table) {
            $table->bigIncrements('torneo_id');
            $table->string('nombre', 100);
            $table->string('pais', 100);
            $table->text('description');
            $table->date('year');
            $table->string('img',255)->nullable();
            $table->string('alt',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('torneos_locales');
    }
}
