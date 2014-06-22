<?php
use Orm\Model;

class Model_Person extends Model
{
	protected static $_properties = array(
		'id',
		'lastname',
		'firstname',
		'lastname_furigana',
		'firstname_furigana',
		'foreign',
		'information',
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

	protected static $_has_many = array(
		'cards' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Card',
			'key_to' => 'person_id',
			'cascade_save' => true,
			'cascade_delete' => true,
		),	
	);
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('lastname', 'Lastname', 'required|max_length[255]');
		$val->add_field('firstname', 'Firstname', 'max_length[255]');
		$val->add_field('lastname_furigana', 'Lastname Furigana', 'max_length[255]');
		$val->add_field('firstname_furigana', 'Firstname Furigana', 'max_length[255]');
		$val->add_field('foreign', 'Foreign', 'required|valid_string[numeric]');
		//$val->add_field('information', 'Information', 'required');

		return $val;
	}

	public static function get_selectmenu_of_people()
	{
		$selectmenu_of_people[0] = '選択してください';

		foreach (Model_Person::find('all', 
			array('select' => array('lastname','firstname'))) as $item)
		{
			array_push($selectmenu_of_people , ($item->lastname).' '.($item->firstname));
		}
		return $selectmenu_of_people;
	}
}
