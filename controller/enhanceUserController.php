
<?php
class EnhancedUser {

    public function viewMyAssignedPapers($uid) {
        $paper = new Paper();
        $paper->connectPaperDB();
        $result = $paper->viewMyAssignedPapers($uid);
        return $result->num_rows > 0 ? $result : false;
    }

    public function createBid($pid, $uid) {
        $bid = new Bid();
        $bid->connectDB();
        if ($bid->createBid($pid, $uid) && $this->updatePaperStatus($pid, 'bidded')) {
            return true;
        }
        return false;
    }

    public function deleteBid($bid, $pid) {
        $bid = new Bid();
        $bid->connectDB();
        if ($bid->deleteBid($bid) && $this->updatePaperStatus($pid, 'pending')) {
            return true;
        }
        return false;
    }

    private function updatePaperStatus($pid, $status) {
        $paper = new Paper();
        $paper->connectPaperDB();
        return $paper->updatePaperStatus($pid, $status);
    }

    public function viewPaperReviews($pid) {
        $review = new Review();
        $review->connectDB();
        $result = $review->viewPaperReviews($pid);
        return $result->num_rows > 0 ? $result : false;
    }

    public function viewMyReviews($uid) {
        $review = new Review();
        $review->connectDB();
        $result = $review->viewMyReviews($uid);
        return $result->num_rows > 0 ? $result : false;
    }

    public function scoreReview($score, $rid) {
        $review = new Review();
        $review->connectDB();
        return $review->scoreReview($score, $rid);
    }
}

// Usage
$user = new EnhancedUser();

// can call any method on the user object
$assignedPapers = $user->viewMyAssignedPapers($uid);

?>