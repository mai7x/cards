<?php
class Controller_Cards extends Controller_Template{

	public function action_index()
	{
		$data['cards'] = Model_Card::find('all', array('related' => array('person','company')));
		$this->template->title = "Cards";
		$this->template->content = View::forge('cards/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('cards');

		if ( ! $data['card'] = Model_Card::find($id, array('related' => array('person','company')) ))
		{
			Session::set_flash('error', 'Could not find card #'.$id);
			Response::redirect('cards');
		}


		$this->template->title = "Card";
		$this->template->content = View::forge('cards/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Card::validate('create');
			
			if ($val->run())
			{
				$card = Model_Card::forge(array(
					'person_id' => Input::post('person_id'),
					'company_id' => Input::post('company_id'),
					'department' => Input::post('department'),
					'position' => Input::post('position'),
					'postcode' => Input::post('postcode'),
					'address' => Input::post('address'),
					'email' => Input::post('email'),
					'tel' => Input::post('tel'),
					'fax' => Input::post('fax'),
				));

				if ($card and $card->save())
				{
					Session::set_flash('success', 'Added card #'.$card->id.'.');

					Response::redirect('cards');
				}

				else
				{
					Session::set_flash('error', 'Could not save card.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		//name 選択メニューを生成
		$selectmenu_of_people = Model_Person::get_selectmenu_of_people();
		$this->template->set_global('selectmenu_of_people', $selectmenu_of_people);

		//company 選択メニューを生成
		$selectmenu_of_companies = Model_Company::get_selectmenu_of_companies();
		$this->template->set_global('selectmenu_of_companies', $selectmenu_of_companies);

		$this->template->title = "Cards";
		$this->template->content = View::forge('cards/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('cards');

		// $id からデータを取得
		if ( ! $card = Model_Card::find($id))
		{
			Session::set_flash('error', 'Could not find card #'.$id);
			Response::redirect('cards');
		}

		$val = Model_Card::validate('edit');

		if ($val->run())
		{
			$card->person_id = Input::post('person_id');
			$card->company_id = Input::post('company_id');
			$card->department = Input::post('department');
			$card->position = Input::post('position');
			$card->postcode = Input::post('postcode');
			$card->address = Input::post('address');
			$card->email = Input::post('email');
			$card->tel = Input::post('tel');
			$card->fax = Input::post('fax');

			if ($card->save())
			{
				Session::set_flash('success', 'Updated card #' . $id);

				//編集後は個人情報ページへ
				Response::redirect('people/view/'.$card->person_id);
			}

			else
			{
				Session::set_flash('error', 'Could not update card #' . $id);
			}
		}

		else
		{
			//POSTの場合
			if (Input::method() == 'POST')
			{
				$card->person_id = $val->validated('person_id');
				$card->company_id = $val->validated('company_id');
				$card->department = $val->validated('department');
				$card->position = $val->validated('position');
				$card->postcode = $val->validated('postcode');
				$card->address = $val->validated('address');
				$card->email = $val->validated('email');
				$card->tel = $val->validated('tel');
				$card->fax = $val->validated('fax');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('card', $card, false);

		}

		//name 選択メニューを生成
		$selectmenu_of_people = Model_Person::get_selectmenu_of_people();
		$this->template->set_global('selectmenu_of_people', $selectmenu_of_people);
		//company 選択メニューを生成
		$selectmenu_of_companies = Model_Company::get_selectmenu_of_companies();
		$this->template->set_global('selectmenu_of_companies', $selectmenu_of_companies);

		$this->template->title = "Cards";
		$this->template->content = View::forge('cards/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('cards');

		if ($card = Model_Card::find($id))
		{
			$card->delete();

			Session::set_flash('success', 'Deleted card #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete card #'.$id);
		}

		Response::redirect('cards');

	}


}
