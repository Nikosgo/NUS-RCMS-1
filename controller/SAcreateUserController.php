<?php
//$name = $_POST["name"];
//$email = $_POST["email"];
//$password = $_POST["password"];
//$profileName = $_POST["userProfile"];

require("../entity/user.php");
//require_once("./entity/user.php");//for unit testing
?>

<?php
class SACreateUserController
{
	public $name;
	public $email;
	public $password;
	public $profileName;

	function __construct()
	{
	}
	function createUser($name, $email, $password, $profileName)
	{
		if($name == "") return false;
		if($email == "") return false;
		if($password == "") return false;
		$user1 = new User($name, $email, $password, $profileName);
		$user1->connectUserDB();
		if ($user1->createUser($name, $email, $password, $profileName)) {
			return true;
		} else return false;
	}
}
?>