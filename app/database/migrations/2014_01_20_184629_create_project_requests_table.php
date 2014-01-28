<?php

use Illuminate\Database\Migrations\Migration;

class CreateProjectRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_requests', function($table)
		{
			$table->increments('id');
			$table->integer('client_id');
			$table->integer('contact_id');
			$table->integer('status');
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
		Schema::drop('project_requests');
	}

}