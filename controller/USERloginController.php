<?php
require("../model/user.php");
?>

<?php
class USERLoginController
{
	public $email;
	public $password;
	public $id;

	function __construct()
	{
	}
	function validateLogin($email, $password)
	{
		$user1 = new User();
		$user1->connectUserDB();
		if ($user1->validateUser($email, $password)) {
			$result = $user1->retrieveUser($email, $password);
			return $result;
		} else return false;
	}
}
?>