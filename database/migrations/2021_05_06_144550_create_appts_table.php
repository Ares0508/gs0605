<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appts', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('user_id');
            $table->integer('user_eigyo_id');
            $table->integer('truck_id');
            $table->integer('category_code_id');
            $table->integer('service_id');
            $table->string('title');
            $table->string('content');
            $table->string('comment');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appts');
    }
}
