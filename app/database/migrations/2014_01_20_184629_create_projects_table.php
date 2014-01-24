<?php

use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function($table)
		{
			$table->increments('id');
			$table->integer('contact_id');
			$table->enum('status', array('saved', 'submitted'));
			$table->string('title')->nullable();
			$table->string('due_date')->nullable();
			$table->enum('retainer', array('yes', 'no'));
			$table->text('details')->nullable();
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
		Schema::drop('projects');
	}

}