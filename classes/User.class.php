<?php

require_once(dirname(__FILE__) . '/../config/database.php');

class User {
	public static $verbose = False;
	
	private $_id;
	private $_login = '';
	private $_email = '';
	private $_password = '';
	
	public function getId () { return ($this->_id); }
	public function getLogin () { return ($this->_login); }
	public function getEmail () { return ($this->_email); }
	public function getPassword () { return ($this->_password); }
	//private function _setId ($id) { $this->_id = $id; }
	private function _setLogin ($login) { $this->_login = $login; }
	private function _setEmail ($email) { $this->_email = $email; }
	private function _setPassword ($password) { $this->_password = $password; }
	
	public function isInvalid ()
	{
		$errors = [];
		
		if (empty($this->getLogin())) {
			$errors[] = "empty Login";
		}
		if (empty($this->getEmail())) {
			$errors[] = "empty email";
		}
		if (empty($this->getPassword())) {
			$errors[] = "empty password";
		}
		return (empty($errors) ? False : $errors);
	}
	
	public function save()
	{
		if (($errors = $this->isInvalid()) != False)
		{
			echo "invalid input\n";
			return ($errors);
		}
		else
		{
		try {
			$dbh = new PDO($GLOBALS['DB_DSN'],
							$GLOBALS['DB_USER'],
							$GLOBALS['DB_PASSWORD'],
							$GLOBALS['DB_OPTS']);
			$sql = "INSERT INTO Users (login, email, password) VALUE (:login, :email, :password);";
			$sth = $dbh->prepare($sql);
			$sth->bindParam(':login', $this->_login);
			$sth->bindParam(':email', $this->_email);
			$sth->bindParam(':password', $this->_password);
			$sth->execute();
			return (True);
			}
		catch (PDOException $e)
			{
		    echo $sql . "<br>" . $e->getMessage();
			}
		    
		$dbh = null;
		}
	}
	
	public function __construct (array $kwargs) {
		//_setId($kwargs['id']);
		$this->_setLogin($kwargs['login']);
		$this->_setEmail($kwargs['email']);
		$this->_setPassword($kwargs['password']);
		if (self::$verbose)
		{
			echo "new User created";
		}
	}
}

?>