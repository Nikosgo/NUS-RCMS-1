<?php
require("../model/paper.php");
?>

<?php
class RviewPaperController
{
    function __construct()
    {
    }
    function viewPaper($pid){
        $paper1 = new Paper();
        $paper1->connectPaperDB();
        $result = $paper1->viewPaper($pid);
        if($result->num_rows > 0) return $result;
        else return false;
    }
}
?>