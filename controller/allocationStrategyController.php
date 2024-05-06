<?php
require_once("../model/user.php");


interface AllocationStrategy {
    public function allocatePaper($paperList, $reviewerList);
}

class AutomaticAllocationStrategy implements AllocationStrategy {
    public function allocatePaper($paperList, $reviewerList) {
            $user1 = new User();
            $result = $user1->viewAvailReviewers();
            $reviewers = [];
            while ($row = $result->fetch_assoc()) {
                $reviewers[] = $row;
            }       

            if (empty($reviewers)) {
                throw new Exception("No available reviewers found.");
                return false;
            }

            $currentLoads = array_column($reviewers, 'workload');
            $leastLoadedReviewer = min($currentLoads);
            $reviewerIndex = array_search($leastLoadedReviewer, $currentLoads);
            if ($reviewerIndex === false) {
                throw new Exception("Failed to find the least loaded reviewer.");
                return false;
            }

            $paper = new Paper();
            $paper->connectPaperDB();
            $paper->assignPaperStatus($paperList, $reviewers[$reviewerIndex]['UID'], 'assigned');
            $reviewers[$reviewerIndex]['workload']++;   
            return $reviewers[$reviewerIndex]['UID'];
        
    }
}

class ManualAllocationStrategy implements AllocationStrategy {
    public function allocatePaper($paperList, $reviewerList) {
        $paper = new Paper();          
        $paper->connectPaperDB();       
        if ($paper->assignPaperStatus($paperList, $reviewerList, 'assigned')) {
            return true;               
        }                
        return false;   
    }
}

class AllocationContext {
    private $allocationstrategy;

    public function setAllocationStrategy(AllocationStrategy $allocationstrategy) {
        $this->allocationstrategy = $allocationstrategy;
    }

    public function executeAllocation($paperList,$reviewerList) {
       return $this->allocationstrategy->allocatePaper($paperList,$reviewerList);
    }
}
?>
