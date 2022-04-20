<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTranslatorsTable extends Migration
{
    public function up()
    {
        Schema::table('translators', function (Blueprint $table) {
            $table->unsignedBigInteger('translator_id')->nullable();
            $table->foreign('translator_id', 'translator_fk_6205880')->references('id')->on('users');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_6205886')->references('id')->on('users');
        });
    }
}
