<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashmemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashmemos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('memo_no')->nullable();
            $table->string('date')->nullable();
            $table->string('name')->nullable();
            $table->integer('phone')->nullable();
            $table->string('address')->nullable();
            $table->integer('pitches')->nullable();
            $table->integer('price')->nullable();
            $table->string('seller')->nullable();
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
        Schema::dropIfExists('cashmemos');
    }
}
