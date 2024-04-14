<?php
require("../model/review.php");

class ViewMyReviewsController
{
    public function viewMyReviews($uid)
    {
        $review1 = new Review();
        $review1->connectDB();
        $result = $review1->viewMyReviews($uid);
        if ($result->num_rows > 0) {
            return $result;
        } else return false;
    }
}

//viewmyreviews