<?php
require("../entity/paper.php");
?>

<?php
class AdeletePaperController
{
	function __construct()
	{
	}
	function checkPaperStatus($pid){
		$paper1 = new Paper();
		$paper1->connectPaperDB();
		$result = $paper1->checkPaperStatus($pid);
		$row = $result->fetch_assoc();
		if ($row['status'] == 'pending') {
			return true;
		} else return false;
	}

	function deletePaper($pid)
	{
		if($this->checkPaperStatus($pid)){
			$paper1 = new Paper();
			$paper1->connectPaperDB();
			if ($paper1->deletePaper($pid)) {
				return true;
			} else return false;
		}
		else return false;
	}
}
?>