<?php
require("../entity/user.php");
?>

<?php
class SAdeleteUserController
{
	function __construct()
	{
	}

	function deleteUser($uid)
	{
		$user1 = new User();
		$user1->connectUserDB();
		if ($user1->deleteUser($uid)) {
			return true;
		} else return false;
	}
}
?>