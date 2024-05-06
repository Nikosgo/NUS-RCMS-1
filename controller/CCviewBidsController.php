<?php
require("../model/bid.php");

class ViewBidsController
{
    public function viewReadyAssign()
    {
        $bid1 = new Bid();
        $bid1->connectDB();
        $result = $bid1->viewReadyAssign();
        if ($result->num_rows > 0){ return $result;}
        else return false;
    }
}
