<?php

require_once(dirname(__FILE__) . '/../../config/database.php');

class User {
	public static $verbose = False;
	private static $hashalgo = 'whirlpool';
	
	private $_id;
	private $_login;
	private $_email;
	private $_password;
	private $_pwconfirm;
	
	public function getId () { return ($this->_id); }
	public function getLogin () { return ($this->_login); }
	public function getEmail () { return ($this->_email); }
	public function getPassword () { return ($this->_password); }
	public function getPwconfirm () { return ($this->_pwconfirm); }
	//private function _setId ($id) { $this->_id = $id; }
	private function _setLogin ($login) { $this->_login = $login; }
	private function _setEmail ($email) { $this->_email = $email; }
	private function _setPassword ($password) { $this->_password = $password; }
	private function _setPwconfirm ($pwconfirm) { $this->_pwconfirm = $pwconfirm; }
	
	public static function get_by_login($login) {
		try
		{
			$dbh = new PDO($GLOBALS['DB_DSN'],
							$GLOBALS['DB_USER'],
							$GLOBALS['DB_PASSWORD'],
							$GLOBALS['DB_OPTS']);
			$sql = 'SELECT * FROM Users WHERE login=:login;';
			$sth = $dbh->prepare($sql);
			$sth->bindParam(':login', $login);
			$sth->execute();
			if ($sth->fetch()) {
				$dbh = null;
				return (True);
			} else {
				$dbh = null;
				return (False);
			}
		}
		catch (PDOException $e)
		{
		    echo $sql . "<br>" . $e->getMessage();
		}
		$dbh = null;
	}
		
	public function validate(&$errors) {
		// all fields are present and not null
		//$fion = self::get_by_login($this->getLogin());
		if ($this->getLogin() === '') {
			$errors[] = 'login must be provided';
		}
		if ($this->getEmail() === '') {
			$errors[] = 'email must be provided';
		}
		if ($this->getPassword() === '') {
			$errors[] = 'password must be provided';
		}
		// username does not exist already
		if (self::get_by_login($this->getLogin())) {
			$errors[] = 'login already exists';
		}
		// login does not exist already
		// password is at least 8 chars long
		// password has at least one letter, one digit
		// password and confirmation match
		if ($this->getPassword() !== $this->getPwconfirm()) {
			$errors[] = 'password and confirmation must match';
		}
		return (empty($errors));
	}
	
	public function save()
	{
		try {
			$dbh = new PDO($GLOBALS['DB_DSN'],
							$GLOBALS['DB_USER'],
							$GLOBALS['DB_PASSWORD'],
							$GLOBALS['DB_OPTS']);
			$sql = "INSERT INTO Users (login, email, password) VALUE (:login, :email, :password);";
			$sth = $dbh->prepare($sql);
			$sth->bindParam(':login', $this->getLogin());
			$sth->bindParam(':email', $this->getEmail());
			$sth->bindParam(':password', hash(self::$hashalgo, $this->getPassword()));
			$sth->execute();
			return (True);
			}
		catch (PDOException $e)
			{
		    echo $sql . "<br>" . $e->getMessage();
			}
		    
		$dbh = null;
	}
	
	public function __construct (array $kwargs) {
		$this->_setLogin($kwargs['login']);
		$this->_setEmail($kwargs['email']);
		$this->_setPassword($kwargs['password']);
		$this->_setPwconfirm($kwargs['pwconfirm']);
		if (self::$verbose)
		{
			echo "new User created";
		}
	}
}

?>