<?php
require("../entity/paper.php");

class CCviewAssignedController
{
    public function viewAssignedPapers()
    {
        $paper1 = new Paper();
        $paper1->connectPaperDB();
        $result = $paper1->viewAssignedPapers();
        if ($result->num_rows > 0) {
            return $result;
        } else return false;
    }
}
