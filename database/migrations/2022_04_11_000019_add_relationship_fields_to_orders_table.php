<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('client_order_id')->nullable();
            $table->foreign('client_order_id', 'client_order_fk_6205864')->references('id')->on('clients');
            $table->unsignedBigInteger('languages_s_id')->nullable();
            $table->foreign('languages_s_id', 'languages_s_fk_6205869')->references('id')->on('languages');
            $table->unsignedBigInteger('languages_na_id')->nullable();
            $table->foreign('languages_na_id', 'languages_na_fk_6205870')->references('id')->on('languages');
        });
    }
}
