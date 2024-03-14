<?php
require("../entity/bid.php");
require("../entity/paper.php");
?>

<?php
class RcreateBidController
{

	function __construct()
	{
	}
	function createBid($pid, $uid)
	{
		$bid1 = new Bid();
		$bid1->connectDB();
		if ($bid1->createBid($pid, $uid)) {
			if($this->updatePaperStatus($pid)){
				return true;
			}
		} else return false;
	}
	function updatePaperStatus($pid){
		$paper1 = new Paper();
        $paper1->connectPaperDB();
		if($paper1->updatePaperStatus($pid, 'bidded')){
			return true;
		}
		else return false;
	}
}
?>