<?php
class Controller_Companies extends Controller_Template{

	public function action_index()
	{
		$data['companies'] = Model_Company::find('all');
		$this->template->title = "Companies";
		$this->template->content = View::forge('companies/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('companies');

		if ( ! $data['company'] = Model_Company::find($id))
		{
			Session::set_flash('error', 'Could not find company #'.$id);
			Response::redirect('companies');
		}

		$this->template->title = "Company";
		$this->template->content = View::forge('companies/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Company::validate('create');
			
			if ($val->run())
			{
				$company = Model_Company::forge(array(
					'company_name' => Input::post('company_name'),
					'company_information' => Input::post('company_information'),
				));

				if ($company and $company->save())
				{
					Session::set_flash('success', 'Added company #'.$company->id.'.');

					Response::redirect('companies');
				}

				else
				{
					Session::set_flash('error', 'Could not save company.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Companies";
		$this->template->content = View::forge('companies/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('companies');

		if ( ! $company = Model_Company::find($id))
		{
			Session::set_flash('error', 'Could not find company #'.$id);
			Response::redirect('companies');
		}

		$val = Model_Company::validate('edit');

		if ($val->run())
		{
			$company->company_name = Input::post('company_name');
			$company->company_information = Input::post('company_information');

			if ($company->save())
			{
				Session::set_flash('success', 'Updated company #' . $id);

				Response::redirect('companies');
			}

			else
			{
				Session::set_flash('error', 'Could not update company #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$company->company_name = $val->validated('company_name');
				$company->company_information = $val->validated('company_information');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('company', $company, false);
		}

		$this->template->title = "Companies";
		$this->template->content = View::forge('companies/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('companies');

		if ($company = Model_Company::find($id))
		{
			$company->delete();

			Session::set_flash('success', 'Deleted company #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete company #'.$id);
		}

		Response::redirect('companies');

	}


}
