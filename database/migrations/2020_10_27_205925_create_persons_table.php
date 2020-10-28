<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('name');
            $table->string('birth_year');
            $table->string('eye_color');
            $table->string('gender');
            $table->string('hair_color');
            $table->string('height');
            $table->string('mass');
            $table->string('skin_color');
            $table->unsignedInteger('planet_id');
            $table->string('url');
            $table->timestamp('created');
            $table->timestamp('edited');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persons');
    }
}
