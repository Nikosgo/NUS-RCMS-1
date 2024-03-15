<?php
require("../entity/review.php");
require("../entity/paper.php");
require("../entity/user.php");
?>

<?php
class CreateReviewController
{
    function __construct()
    {
    }
    function updatePaperStatus($pid){
		$paper1 = new Paper();
        $paper1->connectPaperDB();
		if($paper1->updatePaperStatus($pid, 'reviewed')){
			return true;
		}
		else return false;
	}
    function updateReviewerAssigned($reviewerID){
        //get the current assigned #
        $user1 = new User();
		$user1->connectUserDB();
		$result = $user1->searchUID($reviewerID);
        $row = $result->fetch_assoc();
        $assigned = $row['assigned'];
        //decrement by one (since we have created a review)
        $assigned -=1;
        //update new number back to DB
        if($user1->editAssigned($assigned, $reviewerID)){
            return true;
        }else return false;
    }


    function createReview($content, $rating, $reviewerID, $pid)
    {
        if ($content == '') return false;
        $review = new Review();
        $review->connectDB();
        if ($review->createReview($content, $rating, $reviewerID, $pid)) {//create review and update in DB_review
			if($this->updatePaperStatus($pid)){//update status in DB_paper
				if($this->updateReviewerAssigned($reviewerID)){//update assigned in DB_user
                    return true;
                }
			}
		} else return false;
    }
}
?>
