<?php
require("../model/review.php");
?>

<?php
class AscoreReviewController {
    function __contruct() {

    }
    
    function scoreReview($score, $rid) {
        $review = new Review();
        $review->connectDB();
        if ($review->scoreReview($score, $rid)) {
            return true;
        }
        else {
            return false;
        }
    }
}
?>