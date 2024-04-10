<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <?php
    function displayError($msg)
    { //displays error message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/reviewerDashboard.php';</script>";
    }
    function displaySuccess($msg)
    { //displays success message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/reviewerDashboard.php';</script>";
    }
    function displayForm()
    {
        $rid = $_POST['rid'];
    ?>
        <!-- 
        form action to self
        set flag
        take in user input
    -->
        <form action="../ui/RcreateCommentUI.php" method="POST" class="row">
            <div class="col-auto">
                <input type="hidden" id="flag" name="flag" value=1>
                <input type="hidden" id="rid" name="rid" value="<?php echo $_POST['rid'] ?>">
                <label for="content" class="form-label">Comment Content:</label><br>
                <input class="form-control" type="text" id="content" name="content" placeholder="Write Comment here"><br>
                <input class="form-control" type="submit" value="Submit">
            </div>

        </form>
    <?php
    }
    ?>
</head>

<body>
    <?php
    session_start();
    //insert support/display functions here
    $userID = $_SESSION['UID'];
    if (isset($_POST['flag'])) {
        if ($_POST['flag'] == 1) {
            //retrieve $_POST vars
            $content = $_POST['content'];
            $reviewID = $_POST['rid'];
            //require("");//require controller
            require("../control/RcreateCommentController.php");
            //instantiate controller
            $createCommentController1 = new CreateCommentController();
            //$Controller1 = new Controller();
            //if(function return false/error)
            if (!$createCommentController1->createComment($content, $userID, $reviewID)) {
                displayError("Error Creating Comment!");
            }
            //handle error
            else {
                displaySuccess("Comment Created successfully!");
            }
            //else
            //extract and display data
        }
    } else {
        displayForm();
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