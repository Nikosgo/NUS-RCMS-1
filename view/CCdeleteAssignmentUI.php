<html>
    <head>
    <link href="style.css" rel="stylesheet">
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    </head>
    <body>
        <?php
            require("../controller/CCdeleteAssignmentController.php");
            function displayError($msg)
            { //displays error message
                echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost:8080/view/ccDashboard.php';</script>";
            }
            function displaySuccess($msg)
            { //displays success message
                echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost:8080/view/ccDashboard.php';</script>";
            }

            $pid = $_POST['pid'];
            $reviewerID = $_POST['reviewerID'];
            $assignController1 = new CCdeleteAssignmentController();
            if (!$assignController1->deleteAssignment($pid, $reviewerID)) {
                displayError("Unable to unassign reviewer! Reviewer ID: $reviewerID Paper ID : $pid");
            }
            else {
                displaySuccess("Unassign reviewer success! Unassigned Reviewer ID: $reviewerID from Paper ID: $pid");
            }
        ?>
    </body>
</html>