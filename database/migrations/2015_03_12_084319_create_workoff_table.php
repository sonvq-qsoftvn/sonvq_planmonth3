<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkoffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create( 'workoff', function(Blueprint $table){
		    $table->engine = 'InnoDB';
			$table->increments('id');
			$table->unsignedInteger('language_id');
			$table->foreign('language_id')->references('id')->on('language');
			$table->string('name', 255)->nullable();
            $table->string('position', 255)->nullable();            
            $table->string('department', 255)->nullable();
            $table->string('kind', 255)->nullable();
            $table->string('reason', 255)->nullable();
            $table->string('description', 255)->nullable();
            $table->integer('days')->nullable();
            $table->datetime('datestart');
            $table->datetime('dateend');
            $table->integer('status')->nullable();
			$table->unsignedInteger('user_id')->nullable();
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
		Schema::drop('workoff');
	}

}
