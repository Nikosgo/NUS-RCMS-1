<?php
require("../entity/userProfile.php");
//require_once("./entity/userProfile.php");//for unit testing
?>

<?php
class SAeditUserProfileController
{
	function __construct()
	{
	}
	function viewUserProfile($upid){
		$userProfile1 = new UserProfile();
		$userProfile1->connectUserProfileDB();
		$result = $userProfile1->viewUserProfileByID($upid);
		if($result->num_rows > 0) return $result;
		else return false;
	}

	function editUserProfile($profileName, $upid)
	{
		if($profileName == "") return false;
		$userProfile1 = new UserProfile();
		$userProfile1->connectUserProfileDB();
		if ($userProfile1->editUserProfile($profileName, $upid)) {
			return true;
		} else return false;
	}
}
?>