<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToNotarizationsTable extends Migration
{
    public function up()
    {
        Schema::table('notarizations', function (Blueprint $table) {
            $table->unsignedBigInteger('client_docum_id')->nullable();
            $table->foreign('client_docum_id', 'client_docum_fk_6205873')->references('id')->on('clients');
        });
    }
}
