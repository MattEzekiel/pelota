<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMundialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mundiales', function (Blueprint $table) {
            $table->bigIncrements('mundial_id');
            $table->string('nombre', 100);
            $table->text('description');
            $table->date('year');
            $table->string('img',255);
            $table->string('alt',255);
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
        Schema::dropIfExists('mundiales');
    }
}
