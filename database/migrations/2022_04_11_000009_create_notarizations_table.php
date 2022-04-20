<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotarizationsTable extends Migration
{
    public function up()
    {
        Schema::create('notarizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_document')->nullable();
            $table->boolean('seal_translator')->default(0)->nullable();
            $table->string('status_docum')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
