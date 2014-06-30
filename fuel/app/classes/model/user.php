<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'password',
		'last_login',
		'login_hash',
		'profile_fields',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);
	protected static $_table_name = 'users';

	public static function register (Fieldset $form)
	{
		$form->add('username', 'Username: ')->add_rule('required');
		$form->add('password', 'Choose Password: ', array('type'=>'password'))->add_rule('required');
		$form->add('password2', 'Re-Type Password: ', array('type'=>'password'))->add_rule('required');
		$form->add('submit', ' ', array('type' =>'submit', 'value'=>'Register'));
		return $form;

	}

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('username','Username','required');
		$val->add_field('password','Password','required');
		$val->add_field('password2', 'Password2', 'match_field[password]');

 
		return $val;
	}

	public static function validate_registration($post_data)
	{
		echo 'in model, postdata username is '.$post_data['username']."\n";

	}

}
