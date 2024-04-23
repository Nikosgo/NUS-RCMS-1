<?php

interface AllocationStrategy {
    public function allocatePaper($paperList, $reviewerList);
}

class AutomaticAllocationStrategy implements AllocationStrategy {
    public function allocatePaper($paperList, $reviewerList) {
        foreach ($paperList as $paperInfo) {
            $leastLoadedReviewer = min(array_column($reviewerList, 'currentLoad'));
            $reviewerIndex = array_search($leastLoadedReviewer, array_column($reviewerList, 'currentLoad'));
            $paper = new Paper();
            $paper->connectPaperDB();
            $paper->assignPaperStatus($paperInfo['pid'], $reviewerList[$reviewerIndex]['uid'], 'assigned');
            $reviewerList[$reviewerIndex]['currentLoad']++; 
        }   
    }
}

class ManualAllocationStrategy implements AllocationStrategy {
    public function allocatePaper($paperList, $reviewerList) {
        foreach ($paperList as $paperInfo) {
            foreach ($reviewerList as $reviewerInfo){
                $paper = new Paper();          
                $paper->connectPaperDB();       
                if ($paper->assignPaperStatus($paperInfo['pid'], $reviewerInfo['uid'], 'assigned')) {
                    return true;               
                }                
            }  
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
        $this->allocationstrategy->allocatePaper($paperList,$reviewerList);
    }
}

/* // Usage
$context = new AllocationContext();
$context->setAllocationStrategy(new AutomaticAllocationStrategy());
$context->executeAllocation($paperList,$reviewerList);

$context->setAllocationStrategy(new ManualAllocationStrategy());
$context->executeAllocation($paperList,$reviewerList); */

?>
