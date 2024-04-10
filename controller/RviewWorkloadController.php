<?php
require("../entity/user.php");

class ViewWorkloadController
{

    //
    function viewWorkload($uid){
		$user1 = new User();
		$user1->connectUserDB();
		$result = $user1->searchUID($uid);
		return $result;
	}
}
