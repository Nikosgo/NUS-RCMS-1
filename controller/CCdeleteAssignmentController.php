<?php
require("../entity/paper.php");
require("../entity/user.php");
?>

<?php
class CCdeleteAssignmentController {
    function __contruct() {

    }
    
    function deleteAssignment($pid, $reviewerID) {
        $paper1 = new Paper();
        $paper1->connectPaperDB();
        if ($paper1->deleteAssign($pid)) {
            return $this->updateReviewerAssigned($reviewerID);
        }
        else {
            return false;
        }
    }
    function updateReviewerAssigned($reviewerID){
        $user1 = new User();
		$user1->connectUserDB();
        //get the current assigned #
        $result = $user1->searchUID($reviewerID);
        $row = $result->fetch_assoc();
        $assigned = $row['assigned'];
        //decrement by one (since we have unassigned)
        $assigned -=1;
        //update new number back to DB
        if($user1->editAssigned($assigned, $reviewerID)){
            return true;
        }else return false;
    }
}
?>