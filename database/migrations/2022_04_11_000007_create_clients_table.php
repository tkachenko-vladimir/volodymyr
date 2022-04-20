<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_client');
            $table->string('email_client');
            $table->longText('phone')->nullable();
            $table->longText('address')->nullable();
            $table->longText('info_client')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
