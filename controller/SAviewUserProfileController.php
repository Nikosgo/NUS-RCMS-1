<?php
require("../model/userProfile.php");
class SAviewUserProfileController{
    public function __construct(){}

    public function viewUserProfile(){
        $userProfile1 = new userProfile();
		$userProfile1->connectUserProfileDB();
        $result = $userProfile1->viewUserProfile();
        if ($result->num_rows > 0)  return $result;
        else return false;
    }

}
?>