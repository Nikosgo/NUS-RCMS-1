<?php
require("../entity/user.php");
?>

<?php
class CCemailNotifyController
{
    function __construct()
    {
        
    }
  
	function sendMail($uid, $status){
		$user = new User();
		$user->connectUserDB();
		$result = $user->searchUID($uid);
		$row = $result->fetch_assoc();
		$email = $row['email'];
		if($status == 1) $msg = "Congrats! Your paper has been accepted!";
		else $msg = "Oh no! Your paper has been Rejected!";
		$subject = "Email Notification";
		if(mail($email, $subject, $msg)) return true;
		else return false;
	}

}


?>