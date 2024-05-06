<?php
require("../model/paper.php");

class ViewMyPapersController
{
    public function viewMyPapers($uid)
    {
        $paper1 = new Paper();
        $paper1->connectPaperDB();
        $result = $paper1->viewMyPapers($uid);
        if ($result->num_rows > 0) {
            return $result;
        } else return false;
    }
}
?>