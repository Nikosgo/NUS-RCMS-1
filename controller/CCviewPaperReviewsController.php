<?php
require("../entity/review.php");

class ViewPaperReviewsController
{
    public function viewPaperReviews($pid)
    {
        $review1 = new Review();
        $review1->connectDB();
        $result = $review1->viewPaperReviews($pid);
        if ($result->num_rows > 0) {
            return $result;
        } else return false;
    }
}

//viewPaperreviews
