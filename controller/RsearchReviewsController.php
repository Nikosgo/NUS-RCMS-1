<?php
require("../entity/review.php");
class RsearchReviewsController
{

    public function __construct()
    {
    }

    public function searchReview($query)
    {
        $user1 = new Review();
        $user1->connectDB();
        $result = $user1->searchReview($query);
        if ($result->num_rows > 0) {
            return $result;
        }else return false;
    }
}
