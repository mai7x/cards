<?php

class Controller_Users extends Controller_Template
{

	public function action_login()
	{
		$data["subnav"] = array('login'=> 'active' );
		$this->template->title = 'Users &raquo; Login';
		$this->template->content = View::forge('users/login', $data);
	}

	public function action_logout()
	{
		$data["subnav"] = array('logout'=> 'active' );
		$this->template->title = 'Users &raquo; Logout';
		$this->template->content = View::forge('users/logout', $data);
	}

	public function action_register()
	{
		$auth = Auth::instance();

		if(Input::post())  //
		{//ユーザ登録(Register)ボタン押下の場合

			$val = Model_User::validate('create'); //Validationの情報を取得

			if($val->run()) //Validation実施
			{//Validation OK

				echo "Validation OK\n";
			}
			else 
			{//Validation NG
				Session::set_flash('error', $val->error());
				echo "Validation NG\n";
			}

			//POSTデータをしかるべき変数に読み込ませる
			$user_data = Model_User::validate_registration(Input::post());
//			$auth->create_user(
//				Input::post('username'),
//				Input::post('password'),
//				Input::post('email'),
//				);
//			$result = Model_User::validate_registration($form, $auth);
		}
		$view = View::forge('users/register');

		// viewに直接フォームを記載したことで、不要になった部分
		//$form = Fieldset::forge('register');
		//Model_User::register($form);
		//$view->set('reg', $form->build(),false);

		$data["subnav"] = array('register'=> 'active' );
		$this->template->title = 'Users &raquo; Register';
		//$this->template->content = View::forge('users/register', $data);
		$this->template->content = $view;
	}

}
