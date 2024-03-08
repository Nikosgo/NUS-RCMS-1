<?php
require("../entity/user.php");
//require_once("./entity/user.php");//for unit test
class SAviewUserController{

    public function __construct(){}

    public function viewUser(){
        $user1 = new User();
		$user1->connectUserDB();
        $result = $user1->viewUser();
        if ($result->num_rows > 0) {
            return $result;
        }
        else return false;
    }

}
