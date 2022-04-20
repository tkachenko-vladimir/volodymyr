<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrimersTable extends Migration
{
    public function up()
    {
        Schema::create('primers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('originalr_o')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
