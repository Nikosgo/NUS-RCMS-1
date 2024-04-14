<?php
require("../model/userProfile.php");
//require_once("./model/userProfile.php");//for unit testing
?>

<?php
class SACreateUserProfileController
{

	function __construct()
	{
	}
	function createUserProfile($profileName)
	{
		if($profileName == "") return false;
		$userProfile1 = new UserProfile($profileName);
		$userProfile1->connectUserProfileDB();
		if ($userProfile1->createUserProfile($profileName)) {
			return true;
		} else return false;
	}
}
?>