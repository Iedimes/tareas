<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('task_id');
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->integer('state_id');
            $table->foreign('state_id')->references('id')->on('states');
            $table->date('date_begin');
            $table->date('date_end');
            $table->string('obs');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('admin_users');
            $table->integer('advance');




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
        Schema::dropIfExists('detail_tasks');
    }
}
