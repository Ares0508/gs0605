<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_id')->nullable(); // 社員番号
            $table->string('name')->nullable(); // 氏名
            $table->integer('phone')->nullable(); // 番号
            $table->string('email')->nullable(); // E-mail
            $table->string('dept')->nullable(); // 所属部門
            $table->date('start_day')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
