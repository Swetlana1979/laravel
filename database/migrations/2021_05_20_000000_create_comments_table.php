<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Выполнение миграций.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
			$table->text('description');
            $table->integer('user_id');
			$table->integer('autor_id');
			$table->integer('parent_id');
            
        });
    }

    /**
     * Отмена миграций.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('flights');
    }
}