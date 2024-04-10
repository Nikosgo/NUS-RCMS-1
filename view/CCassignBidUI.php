<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    </head>
    <body>
        <?php
            require("../control/CCassignBidController.php");
            function displayError($msg)
            { //displays error message
                echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/ccDashboard.php';</script>";
            }
            function displaySuccess($msg)
            { //displays success message
                echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/ccDashboard.php';</script>";
            }

            $pid = $_POST['pid'];
            $uid = $_POST['uid'];

            $assignController1 = new CCassignBidController();
            if (!$assignController1->changeBidStatus($pid, $uid)) {
                displayError("Unable to assign reviewer!");
            }
            else {
                displaySuccess("Assigned reviewer succes! User ID : $uid assigned to Paper ID : $pid");
            }
        ?>
    </body>
</html>