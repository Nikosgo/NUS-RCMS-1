<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php
    //insert support/display functions here
    session_start();
    $uid = $_SESSION["UID"];
    require("../control/ReditWorkloadController.php");
    function displayForm($result)
    { //edit style form with default value as current workload (new users default to workload of 5)
        $row = $result->fetch_assoc();
        $workload = $row['workload'];
    ?>
        <form action="../ui/ReditWorkloadUI.php" method="POST" class="row">
            <div class="col-auto">
                <input type="hidden" id="UID" name="UID" value="<?php echo $_SESSION["UID"]; ?>">
                <input type="hidden" id="flag" name="flag" value=1>
                <label for="workload" class="form-label">Preferred Workload:</label><br>
                <input class="form-control" type="text" id="workload" name="workload" value="<?php echo $workload ?>"><br>
                <input class="form-control" type="submit" value="Submit">
            </div>

        </form>
    <?php
    }

    function displayError($msg)
    { //displays error message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/reviewerDashboard.php';</script>";
    }
    function displaySuccess($msg)
    { //displays success message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/reviewerDashboard.php';</script>";
    }

    if (isset($_POST['flag'])) {
        if ($_POST['flag'] == 1) {
            //retrieve $_POST vars
            //require("");//require controller
            $workload = $_POST['workload'];
            //instantiate controller
            //$Controller1 = new Controller();
            $ReditWorkloadController1 = new ReditWorkloadController();
            //if(function return false/error)
            //handle error
            if (!$ReditWorkloadController1->editWorkload($workload, $uid)) {
                displayError("Edit Workload Failed! Check input fields!");
            }
            //else
            else {
                displaySuccess("Edit Workload Success!");
            }
            //extract and display data
        }
    } else {
        $ReditWorkloadController1 = new ReditWorkloadController();
        $result = $ReditWorkloadController1->viewWorkload($uid);
        if ($result) displayForm($result);
        else displayError("Display Workload Form Failed!");
    ?>
        <!-- 
        form action to self
        set flag
        take in user input
    -->

    <?php
    }
    ?>
    <!-- Back Button -->
    <div class="col-auto">
        <form action="reviewerDashboard.php" method="POST">
            <input class="form-control" type="submit" value="Back">
        </form>
    </div>
</body>

</html>