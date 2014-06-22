<?php

namespace Fuel\Migrations;

class Rename_table_persons_to_people
{
	public function up()
	{
		\DBUtil::rename_table('persons', 'people');
	}

	public function down()
	{
		\DBUtil::rename_table('people', 'persons');
	}
}