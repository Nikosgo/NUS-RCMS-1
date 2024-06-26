<?php
require("../model/bid.php");
require("../model/paper.php");
require("../model/user.php");
?>

<?php
class CCassignBidController {
    function __contruct() {

    }

    function changeBidStatus($pid, $uid) {
        $bid1 = new Bid();
        $bid1->connectDB();
        if ($bid1->removeBiddedPaper($pid, $uid)) {
            if ($this->updateReviewerAssigned($uid)){
                    return true;
                }
            else {
                return false;
            }
        }
    }
    function updateReviewerAssigned($reviewerID){
        //get the current assigned #
        $result = $this->searchUID($reviewerID);
        $row = $result->fetch_assoc();
        $assigned = $row['assigned'];
        //increment by one after getting assigned to work
        $assigned +=1;
        //update new number back to DB
        $user1 = new User();
		$user1->connectUserDB();
        if($user1->editAssigned($assigned, $reviewerID)) {
            return true;
        } else {
            return false;
        }
    }
    function searchUID($reviewerID){
        $user1 = new User();
		$user1->connectUserDB();
		$result = $user1->searchUID($reviewerID);
		return $result;
    }
}
?>