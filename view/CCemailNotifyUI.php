<html>
<head>
    <link href="style.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php
    ob_start();  
    //insert support/display functions here
    require("../controller/CCemailNotifyController.php");
    require("../controller/emailController.php");
    require_once("../model/user.php");

    function displayError($msg)
    { //displays error message
        echo"<script type='text/javascript'>alert('$msg'); window.location='http://localhost:8080/view/ccDashboard.php';</script>";
    }
    function displaySuccess($msg)
    { //displays success message
        echo"<script type='text/javascript'>alert('$msg'); window.location='http://localhost:8080/view/ccDashboard.php';</script>";
    }

    $uid = $_GET['uid'];
    $status = $_GET['status'];
    $userModel = new User();
    $result = $userModel->getEmailByUID($uid);
    $row = $result->fetch_assoc();
    $email = $row['email'];
    $emailService = new ExternalEmailService();
	$adapter = new EmailNotificationAdapter($emailService);
	$notification = new Notification();
	$notification->setRecipient($email);
	$notification->setUid($uid);
	$notification->setMessage('Conference Chair have assigned you a paper. Please check the assigned paper from RCMS. Thank You');
	$adapter->send($notification);
    
    if ($adapter->send($notification)) {
        echo "Email sent successfully!";
     } else {
        displayError("Failed to send email.");
    }
    ?>
</body>

</html>
