<?php
require("../model/user.php");
class SAsearchUserController{
    public function __construct(){}

    public function searchUser($query){
        $user1 = new User();
		$user1->connectUserDB();
        $result = $user1->searchUser($query);
        if ($result->num_rows > 0) return $result;
        else return false;
    }

}
?>