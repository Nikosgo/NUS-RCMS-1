<?php
require("../entity/bid.php");

class ViewMyBidsController
{
    public function viewMyBids($uid)
    {
        $bid1 = new Bid();
        $bid1->connectDB();
        $result = $bid1->viewMyBids($uid);
        if ($result->num_rows > 0) {
            return $result;
        } else return false;
    }
}
