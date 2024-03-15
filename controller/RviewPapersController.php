<?php
require("../entity/paper.php");

class ViewPapersController
{

    //$pid, $title, $content, $authorID, $status
    public function reviewerDashboardPapers()
    {
        $paper1 = new Paper();
        $paper1->connectPaperDB();
        $result = $paper1->reviewerDashboardPapers();
        if ($result->num_rows > 0) {
            return $result;
        } else return false;
    }
}
