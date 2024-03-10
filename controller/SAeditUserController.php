<?php
require("../entity/user.php");
//require_once("./entity/user.php");//for unit testing
?>

<?php
class SAEditUserController
{
	function __construct()
	{
	}

	function editUser($name, $email, $password, $profileName, $uid)
	{
		if($name == "") return false;
		if($email == "") return false;
		if($password == "") return false;
		if($profileName == "") return false;
		$user1 = new User();
		$user1->connectUserDB();
		if ($user1->editUser($name, $email, $password, $profileName, $uid)) {
			return true;
		} else return false;
	}
	public function searchUID($query)
	{
		$user1 = new User();
		$user1->connectUserDB();
		$result = $user1->searchUID($query);
		if($result->num_rows > 0) return $result;
		else return false;
	}
}
?>