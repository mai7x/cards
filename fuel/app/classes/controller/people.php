<?php
class Controller_People extends Controller_Template{

	public function action_index()
	{
		$data['people'] = Model_Person::find('all');
		$this->template->title = "People";
		$this->template->content = View::forge('people/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('people');

		if ( ! $data['person'] = Model_Person::find($id)) //Personからデータ読み込み
		{
			Session::set_flash('error', 'Could not find person #'.$id);
			Response::redirect('people');
		}

		$this->template->title = "Person";
		$this->template->content = View::forge('people/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Person::validate('create');
			
			if ($val->run())
			{
				$person = Model_Person::forge(array(
					'lastname' => Input::post('lastname'),
					'firstname' => Input::post('firstname'),
					'lastname_furigana' => Input::post('lastname_furigana'),
					'firstname_furigana' => Input::post('firstname_furigana'),
					'foreign' => Input::post('foreign'),
					'information' => Input::post('information'),
				));

				if ($person and $person->save())
				{
					Session::set_flash('success', 'Added person #'.$person->id.'.');

					Response::redirect('people');
				}

				else
				{
					Session::set_flash('error', 'Could not save person.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "People";
		$this->template->content = View::forge('people/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('people');

		if ( ! $person = Model_Person::find($id))
		{
			Session::set_flash('error', 'Could not find person #'.$id);
			Response::redirect('people');
		}

		$val = Model_Person::validate('edit');

		if ($val->run())
		{
			$person->lastname = Input::post('lastname');
			$person->firstname = Input::post('firstname');
			$person->lastname_furigana = Input::post('lastname_furigana');
			$person->firstname_furigana = Input::post('firstname_furigana');
			$person->foreign = Input::post('foreign');
			$person->information = Input::post('information');

			if ($person->save())
			{
				Session::set_flash('success', 'Updated person #' . $id);

				Response::redirect('people');
			}

			else
			{
				Session::set_flash('error', 'Could not update person #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$person->lastname = $val->validated('lastname');
				$person->firstname = $val->validated('firstname');
				$person->lastname_furigana = $val->validated('lastname_furigana');
				$person->firstname_furigana = $val->validated('firstname_furigana');
				$person->foreign = $val->validated('foreign');
				$person->information = $val->validated('information');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('person', $person, false);
		}

		$this->template->title = "People";
		$this->template->content = View::forge('people/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('people');

		if ($person = Model_Person::find($id))
		{
			$person->delete();

			Session::set_flash('success', 'Deleted person #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete person #'.$id);
		}

		Response::redirect('people');

	}


}
