<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchetsTable extends Migration
{
    public function up()
    {
        Schema::create('schets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomenclatura');
            $table->integer('kol_vo')->nullable();
            $table->integer('stoimost')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
