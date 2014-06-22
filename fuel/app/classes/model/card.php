<?php
use Orm\Model;

class Model_Card extends Model
{
	protected static $_properties = array(
		'id',
		'person_id',
		'company_id',
		'department',
		'position',
		'postcode',
		'address',
		'email',
		'tel',
		'fax',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_belongs_to = array(
		'person' => array(
			'key_from'=> 'person_id',
			'model_to' => 'Model_Person',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
			),
		'company' => array(
			'key_from'=> 'company_id',
			'model_to' => 'Model_Company',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
			),

		);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('person_id', 'Person Id', 'required|valid_string[numeric]');
		$val->add_field('company_id', 'Company Id', 'required|valid_string[numeric]');
		$val->add_field('department', 'Department', 'max_length[255]');
		$val->add_field('position', 'Position', 'max_length[255]');
		$val->add_field('postcode', 'Postcode', 'max_length[255]');
		$val->add_field('address', 'Address', 'max_length[255]');
		$val->add_field('email', 'Email', 'valid_email|max_length[255]');
		$val->add_field('tel', 'Tel', 'max_length[255]');
		$val->add_field('fax', 'Fax', 'max_length[255]');

		return $val;
	}

}
