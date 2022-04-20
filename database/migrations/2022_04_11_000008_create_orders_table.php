<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->string('typepay')->nullable();
            $table->decimal('clients_many', 15, 2)->nullable();
            $table->integer('clients_pages')->nullable();
            $table->date('start_time')->nullable();
            $table->date('end_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
