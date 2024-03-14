<?php
require("../entity/review.php");
require("../entity/paper.php");
?>

<?php
class DeleteReviewController
{
    function __construct()
    {
    }
    function viewReview($rid){//access the review, find out what paper it was associated with
        $review = new Review();
        $review->connectDB();
        $result = $review->viewReview($rid);
        $row = $result->fetch_assoc();
        return $row['PID'];
    }
    function updatePaperStatus($pid){//updates status of paper back tp pending
		$paper1 = new Paper();
        $paper1->connectPaperDB();
		if($paper1->updatePaperStatus($pid, 'pending')){
			return true;
		}
		else return false;
	}
    function deleteReview($rid)
    {
        $review = new Review();
        $review->connectDB();
        //first check if there are >= 2 reviews on this paper
        $pid = $this->viewReview($rid);//get the pid
        $result = $review->searchReviewByPID($pid);
        $count = $result->num_rows;//get the number of reviews on this paper
        if($count >= 2){//if there is >=2 reviews on this paper, can safely delete the review
            if($review->deleteReview($rid)) return true;
            else return false;
        }
        else{//careful! delete review should also set paper back to pending status
            if($review->deleteReview($rid)){//if delete review is sucessful
                if($this->updatePaperStatus($pid)){//update status in DB_paper
                    return true;
                }
                else return false;
            }
            else return false;
        }
    }
}
?>
