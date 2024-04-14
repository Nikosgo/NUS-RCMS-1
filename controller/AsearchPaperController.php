<?php

require("../model/paper.php");
class AsearchPaperController
{

    public function __construct()
    {
    }

    public function searchPaper($query)
    {
        $user1 = new Paper();
        $user1->connectPaperDB();
        $result = $user1->searchPaper($query);
        if ($result->num_rows > 0) {
            return $result;
        } else return false;
    }
}