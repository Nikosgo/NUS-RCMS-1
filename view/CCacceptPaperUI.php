<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php
    //insert support/display functions here
    require("../control/CCacceptPaperController.php");

    function displayError($msg)
    { //displays error message
        echo"<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/ccDashboard.php';</script>";
    }
    function displaySuccess($msg, $uid)
    { //displays success message
        echo"<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/CCemailNotifyUI.php?uid=$uid&status=1';</script>";
    }

    $uid = $_POST['uid'];
    $pid = $_POST['pid'];

    $CCacceptPaperController1 = new CCacceptPaperController();
    if (!$CCacceptPaperController1->acceptPaper($pid))
    {
        displayError("Error accepting paper!");
    }
    else 
    {
        displaySuccess("Paper accepted for PID: $pid ; $uid!", $uid);
    }
    ?>
</body>

</html>
