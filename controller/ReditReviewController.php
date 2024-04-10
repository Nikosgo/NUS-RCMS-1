<?php
require("../entity/review.php");
?>

<?php
class EditReviewController
{
    function __construct()
    {
    }
    function viewReview($rid){
        $review = new Review();
        $review->connectDB();
        if($result = $review->viewReview($rid)){
            return $result;
        }
        else return false;
    }

    function editReview($content, $rating, $rid)
    {
        if ($content == '') return false;
        $review = new Review();
        $review->connectDB();
        if ($review->editReview($content, $rating, $rid)) {//create review and update in DB_review
			return true;
		} else return false;
    }
}
?>
