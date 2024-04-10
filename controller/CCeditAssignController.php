<?php 		ini_set("display_errors", 1); 		error_reporting(E_ALL); 	?>
<?php
include("../entity/paper.php");
include("../entity/user.php");
?>

<?php
class CCeditAssignController {
    function __construct() {

    }
    function viewIndivAssigned($pid, $uid){
        $paper2 = new Paper();
        $paper2->connectPaperDB();
        if($result = $paper2->viewIndivAssigned($pid, $uid)){
            return $result;
        }
        else return false;
    }
    function changeAssigned($paperID, $oldReviewer, $newReviewer) {
        if ( $oldReviewer === $newReviewer) {
            return false;
        }
        $paper1 = new Paper();
        $paper1->connectPaperDB();
        if ($paper1->changeAssigned($paperID, $newReviewer)) {
            if ($this->updateReviewerAssigned($oldReviewer)) {
                if ($this->updateNewReviewerAssigned($newReviewer)) {
                    return true;
                }
            } else return false;
		} 
    }

    function updateReviewerAssigned($oldReviewer){
        //get the current assigned #
        $result = $this->searchUID($oldReviewer);
        $row = $result->fetch_assoc();
        $assigned = $row['assigned'];
        //decrement by one after getting assigned to work
        $assigned -=1;
        //update new number back to DB
        $user1 = new User();
		$user1->connectUserDB();
        if($user1->editAssigned($assigned, $oldReviewer)) {
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

    function updateNewReviewerAssigned($newReviewer){
        //get the current assigned #
        $result = $this->searchUID($newReviewer);
        $row = $result->fetch_assoc();
        $assigned = $row['assigned'];
        //increment by one after getting assigned to work
        $assigned +=1;
        //update new number back to DB
        $user1 = new User();
		$user1->connectUserDB();
        if($user1->editAssigned($assigned, $newReviewer)) {
            return true;
        } else {
            return false;
        }
    }

    function getReviewerList() {
        $user1 = new User();
        $user1->connectUserDB();
        if($result = $user1->getReviewerList()){
            return $result;
        }
        else return false;
    }
}
?>
