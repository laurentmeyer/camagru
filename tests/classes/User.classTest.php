<?php

//use \classes\User;
require_once(dirname(__FILE__) . '/../../classes/User.class.php');

class UserTest extends \PHPUnit_Framework_TestCase
{
	public function testUserNewReturnsNewUser() {
		$new = new User (array('name' => 'laurent'));
		$this->assertInstanceOf('User', $new);
	}
	public function testUserIsInvalidWithMissingParametersReturnsArray() {
		$new = new User (array('name' => 'laurent'));
		$this->assertTrue(is_array($new->isInvalid()));
	}
}