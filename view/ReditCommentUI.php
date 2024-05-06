<?php session_start(); ?>
<html>
<head>
    <link href="style.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <?php

    function displayError($msg)
    { //displays error message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost:8080/view/reviewerDashboard.php';</script>";
    }
    function displaySuccess($msg)
    { //displays success message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost:8080/view/reviewerDashboard.php';</script>";
    }
    function displayForm($result)
    {
        $cid = $_POST['CID'];
        $row = $result->fetch_assoc();
        $content = $row['content'];
    ?>
        <form action="../view/ReditCommentUI.php" method="POST" class="row">
            <div class="col-auto">
                <input type="hidden" id="flag" name="flag" value=1>
                <input type="hidden" id="CID" name="CID" value="<?php echo $cid ?>">
                <label for="content" class="form-label">Comment Content:</label><br>
                <input class="form-control" type="text" id="content" name="content" value="<?php echo $content ?>"><br>
                <div id="form">
                    <button>Submit</button>
                </div>
            </div>
        </form>
    <?php
    }
    ?>
</head>

<body>
    <?php
    //insert support/display functions here
    require("../controller/ReditCommentController.php");
    $userID = $_SESSION['UID'];
    $ReditCommentController1 = new ReditCommentController();
    if (isset($_POST['flag'])) {
        if ($_POST['flag'] == 1) {
            //retrieve $_POST vars
            $content = $_POST['content'];
            $cid = $_POST['CID'];
            if (!$ReditCommentController1->ReditComment($cid, $content)) {
                displayError("Error Editing Comment!");
            }
            else {
                displaySuccess("Comment Edited Successfully!");
            }
        }
    } else {
        $cid = $_POST['CID'];
        $result = $ReditCommentController1->viewComment($cid);
        if($result)
        {
            displayForm($result);
        }
        else displayError("Unable to display comments!");
        
    }
    ?>
    <br><br>
    <!-- Return back to dashboard-->
    <div class="col-auto">
        <form action="reviewerDashboard.php" method="POST">
            <input class="form-control" type="submit" value="Return to Dashboard">
        </form>
    </div>

</body>

</html>