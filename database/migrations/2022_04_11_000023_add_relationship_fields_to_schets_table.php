<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSchetsTable extends Migration
{
    public function up()
    {
        Schema::table('schets', function (Blueprint $table) {
            $table->unsignedBigInteger('klient_name_id')->nullable();
            $table->foreign('klient_name_id', 'klient_name_fk_6205895')->references('id')->on('clients');
        });
    }
}
