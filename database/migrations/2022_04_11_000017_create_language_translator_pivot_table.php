<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageTranslatorPivotTable extends Migration
{
    public function up()
    {
        Schema::create('language_translator', function (Blueprint $table) {
            $table->unsignedBigInteger('translator_id');
            $table->foreign('translator_id', 'translator_id_fk_6205881')->references('id')->on('translators')->onDelete('cascade');
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id', 'language_id_fk_6205881')->references('id')->on('languages')->onDelete('cascade');
        });
    }
}
