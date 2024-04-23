<?php

abstract class UserDecorator implements User {
    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }
}

class ReviewerBiddingDecorator extends UserDecorator {
   
    public function viewMyAssignedPapers($uid)
    {
        $paper1 = new Paper();
        $paper1->connectPaperDB();
        $result = $paper1->viewMyAssignedPapers($uid);
        if ($result->num_rows > 0) {
        return $result;
        }else return false;
    }

    function createBid($pid, $uid)
	{
		$bid1 = new Bid();
		$bid1->connectDB();
		if ($bid1->createBid($pid, $uid)) {
			if($this->updatePaperStatus1($pid)){
				return true;
			}
		} else return false;
	}
	function updatePaperStatus1($pid){
		$paper1 = new Paper();
        $paper1->connectPaperDB();
		if($paper1->updatePaperStatus($pid, 'bidded')){
			return true;
		}
		else return false;
	}

    function deleteBid($bid, $pid)
	{
		$bid1 = new Bid();
		$bid1->connectDB();
		if ($bid1->deleteBid($bid)) {
			if($this->updatePaperStatus($pid)){
				return true;
			}
		} else return false;
	}
	function updatePaperStatus($pid){
		$paper1 = new Paper();
        $paper1->connectPaperDB();
		if($paper1->updatePaperStatus($pid, 'pending')){
			return true;
		}
		else return false;
	}
}

class AuthorReviewerDecorator extends UserDecorator {
    public function viewPaperReviews($pid) {
        $review1 = new Review();
        $review1->connectDB();
        $result = $review1->viewPaperReviews($pid);
        if ($result->num_rows > 0) {
            return $result;
        } else return false;
    }

    public function viewMyReviews($uid)
    {
        $review1 = new Review();
        $review1->connectDB();
        $result = $review1->viewMyReviews($uid);
        if ($result->num_rows > 0) {
            return $result;
        } else return false;
    }

    public function scoreReview($score, $rid) {
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
}

?>
