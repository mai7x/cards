<?php
use Orm\Model;

class Model_Company extends Model
{
	protected static $_properties = array(
		'id',
		'company_name',
		'company_information',
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
			'key_to' => 'company_id',
			'cascade_save' => true,
			'cascade_delete' => true,
		),	
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('company_name', 'Company Name', 'required|max_length[255]');

		return $val;
	}



	public static function get_selectmenu_of_companies()
	{
		$selectmenu_of_companies[0] = '選択してください';

		/*
		   $val[0]->company_name == NTT-BP
		   $val[1]->company_name == Cisco
		 */
		foreach (Model_Company::find('all', array('select' => array('company_name'))) as $item)
		{
			array_push($selectmenu_of_companies , $item->company_name);
		}
		return $selectmenu_of_companies;
	}
}
