<?php
require("../entity/paper.php");

class ViewAssignedPapersController
{

    //
    public function viewMyAssignedPapers($uid)
    {
        $paper1 = new Paper();
        $paper1->connectPaperDB();
        $result = $paper1->viewMyAssignedPapers($uid);
        if ($result->num_rows > 0) {
        return $result;
        }else return false;
    }
}
