<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPzUsersRecoursesConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pz_users_recourses_connections', function(Blueprint $table)
		{
			$table->foreign('recourse_id', 'fk_pz_users_recourses_connections_pz_recourses1')->references('id')->on('pz_recourses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_pz_users_recourses_connections_pz_users1')->references('id')->on('pz_users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pz_users_recourses_connections', function(Blueprint $table)
		{
			$table->dropForeign('fk_pz_users_recourses_connections_pz_recourses1');
			$table->dropForeign('fk_pz_users_recourses_connections_pz_users1');
		});
	}

}
