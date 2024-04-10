<?php
require("../entity/paper.php");
require("../entity/user.php");
?>

<?php
class CCrejectPaperController
{
    function __construct()
    {
        
    }
    
	function rejectPaper($pid, $uid)
    {
		$paper1 = new Paper();
        $paper1->connectPaperDB();
		if($paper1->updatePaperStatus($pid, 'rejected'))
        {
			$this->sendMail($uid);
			return true;
		}
		else return false;
	}
	function sendMail($uid){
		$user = new User();
		$user->connectUserDB();
		$result = $user->searchUID($uid);
		$row = $result->fetch_assoc();
		$email = $row['email'];
		$msg = "Oh no! Your paper has been rejected!";
		$subject = "Email Notification";
		mail($email, $subject, $msg);
	}

}


?>