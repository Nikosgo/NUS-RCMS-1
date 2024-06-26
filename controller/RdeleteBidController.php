<?php
require("../model/bid.php");
require("../model/paper.php");
?>

<?php
class RdeleteBidController
{

	function __construct()
	{
	}

	//pid is used for updating the paper status
	function deleteBid($bid, $pid)
	{
		$bid1 = new Bid();
		$bid1->connectDB();
		if ($bid1->deleteBid($bid)) 
		{
			if($this->updatePaperStatus($pid))
			{
				return true;
			}
		} else return false;
	}
	function updatePaperStatus($pid)
	{
		$paper1 = new Paper();
        $paper1->connectPaperDB();
		if($paper1->updatePaperStatus($pid, 'pending'))
		{
			return true;
		}
		else return false;
	}
}
?>