<?php

namespace Fuel\Migrations;

class Create_persons
{
	public function up()
	{
		\DBUtil::create_table('persons', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'lastname' => array('constraint' => 255, 'type' => 'varchar'),
			'firstname' => array('constraint' => 255, 'type' => 'varchar'),
			'lastname_furigana' => array('constraint' => 255, 'type' => 'varchar'),
			'firstname_furigana' => array('constraint' => 255, 'type' => 'varchar'),
			'foreign' => array('constraint' => 11, 'type' => 'int'),
			'information' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('persons');
	}
}