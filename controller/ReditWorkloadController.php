<?php
require("../entity/user.php");
?>

<?php
class ReditWorkloadController
{
	function __construct()
	{
	}
	function viewWorkload($uid)
	{
		$user1 = new User();
		$user1->connectUserDB();
		$result = $user1->searchUID($uid);
		if ($result->num_rows > 0) return $result;
		else return false;
	}

	function editWorkload($workload, $uid)
	{
		if ($workload == "") return false;
		$user1 = new User();
		$user1->connectUserDB();
		if ($user1->editWorkload($workload, $uid)) {
			return true;
		} else return false;
	}
}
?>