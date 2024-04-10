<?php
//NEW USED FOR SEARCH DELETE AFTER CHECKED
require("../entity/paper.php");
class CCsearchPaperController{

    public function __construct(){}

    public function searchPaper($query){
        $user1 = new Paper();
        $user1->connectPaperDB();
        $result = $user1->searchPaper($query);
        if ($result->num_rows > 0) {
            return $result;
        } else return false;
    }

}
?>