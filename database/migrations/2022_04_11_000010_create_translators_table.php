<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslatorsTable extends Migration
{
    public function up()
    {
        Schema::create('translators', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fio')->nullable();
            $table->string('number_card')->nullable();
            $table->longText('info')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
