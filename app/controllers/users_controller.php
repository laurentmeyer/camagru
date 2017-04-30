<?php

session_start();
require_once(dirname(__FILE__) . '/../models/User.php');
require_once(dirname(__FILE__) . '/../helpers/sessions_helper.php');

class UsersController {
	
	public static function new_user ($params) {
		if (is_authenticated_user()) {
			header('Location: /');
			return ;
		}
		else {
			include(dirname(__FILE__) . '/../views/users/new.php');
			return;
		}
	}
	
	public function create_user (array $post) {
		$errors = [];
		$user = new User ($post);
		if ($user->validate($errors)) {
			//save user !!!!!!!!!!!
			$_SESSION['flash']['success'][] = 'user creation succeeded';
			header('Location: /');
			return ;
		} else {
			$_SESSION['flash']['danger'] = $errors;
			header("Location: /users/new?login=$post[login]&email=$post[email]");
			return ;
		}
		
	}
	
	public function edit (array $params) {
		//
	}
	
	public function update (array $params) {
		//
	}
	
	public function new_token (array $params) {
		//
	}
	
	public function create_token (array $params) {
		//
	}
}



?>