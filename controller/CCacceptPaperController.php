<?php
require("../entity/paper.php");
?>

<?php
class CCacceptPaperController
{
    function __construct()
    {
        
    }
  
	function acceptPaper($pid)
    {
		$paper1 = new Paper();
        $paper1->connectPaperDB();
		if($paper1->updatePaperStatus($pid, 'accepted'))
        {
			return true;
		}
		else return false;
	}

}


?>