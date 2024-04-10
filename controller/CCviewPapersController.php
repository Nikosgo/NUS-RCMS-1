<?php
require("../entity/paper.php");

class ViewPapersController
{

    //$pid, $title, $content, $authorID, $status
    public function viewPapers()
    {
        $paper1 = new Paper();
        $paper1->connectPaperDB();
        $result = $paper1->viewPapers();
        if ($result->num_rows > 0) {
            return $result;
        } else return false;
    }
}
