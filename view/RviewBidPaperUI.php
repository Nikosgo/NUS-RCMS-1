<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php
    //insert support/display functions here
    require("../control/RviewPaperController.php");
    session_start();
    $uid = $_SESSION['UID'];
    $viewPaperController1 = new RviewPaperController();
    $pid = $_POST['PID'];
    function displayError($msg)
    { //displays error message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/reviewerDashboard.php';</script>";
    }
    function displaySuccess($msg)
    { //displays success message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/reviewerDashboard.php';</script>";
    }
    function displayPaper($result){
        $row = $result->fetch_assoc();
    $title = $row['title'];
    $content = $row['content'];
    $status = $row['status'];
    ?>
    <!-- 
        form action to self
        set flag
        take in user input
    -->
    <form class="row">
        <div class="col-auto">
            <label for="Title" class="form-label">Title:</label><br>
            <input class="form-control" type="text" id="title" name="title" value="<?php echo $title ?>" disabled><br>
            <label for="Content" class="form-label">Content:</label><br>
            <input class="form-control" type="text" id="content" name="content" value="<?php echo $content ?>" disabled> <br>
            <label for="Status" class="form-label">Status:</label><br>
            <input class="form-control" type="text" id="Status" name="Status" value="<?php echo $status ?>" disabled> <br>
        </div>
    </form><?php
    }
    $result = $viewPaperController1->viewPaper($pid);
    if($result) displayPaper($result);
    else displayError("Failed to display Paper!");
    ?>
    <!-- Rating number -->
    <!-- Ratings-->
    <br><br>
    <!-- Return back to dashboard-->
    <div class="col-auto">
        <form action="RviewMyBidsUI.php" method="POST">
            <input class="form-control" type="submit" value="Return to My Bids">
        </form>
    </div>

</body>

</html>