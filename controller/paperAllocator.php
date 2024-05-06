<?php
class PaperAllocator {
    private $paperList;
    private $reviewerList;

    public function __construct($paperList, $reviewerList) {
        $this->paperList = $paperList;
        $this->reviewerList = $reviewerList;
    }

    public function automaticAllocation() {
        foreach ($this->paperList as $paperInfo) {
            $leastLoadedReviewer = min(array_column($this->reviewerList, 'currentLoad'));
            $reviewerIndex = array_search($leastLoadedReviewer, array_column($this->reviewerList, 'currentLoad'));
            $paper = new Paper();
            $paper->connectPaperDB();
            $paper->assignPaperStatus($paperInfo['pid'], $this->reviewerList[$reviewerIndex]['uid'], 'assigned');
            $this->reviewerList[$reviewerIndex]['currentLoad']++; 
        }
    }

    public function manualAllocation() {
        foreach ($this->paperList as $paperInfo) {
            foreach ($this->reviewerList as $reviewerInfo){
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

// Usage
$allocator = new PaperAllocator($paperList, $reviewerList);
$allocator->automaticAllocation(); // For automatic allocation

// For manual allocation
if (!$allocator->manualAllocation()) {
    echo "Manual allocation failed for all papers.";
}
?>