<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotTaskTaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('task_task', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('task_child')->unsigned()->index();
			$table->integer('task_parent')->unsigned()->index();
			//$table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
			//$table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('task_task');
	}

}
