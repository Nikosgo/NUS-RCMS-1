<?php session_start()  ?>
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
    function displayForm()
    {
    ?>
        <!-- 
        form action to self
        set flag
        take in user input
    -->
        <form action="../view/RcreateReviewUI.php" method="POST" class="row">
            <div class="col-auto">
                <input type="hidden" id="flag" name="flag" value=1>
                <input type="hidden" id="pid" name="pid" value="<?php echo $_POST['pid'] ?>">
                <label for="content" class="form-label">Review Content:</label><br>
                <input class="form-control" type="text" id="content" name="content" placeholder="Write review here"><br>
                <label for="rating">Rating:</label>
                <select name="rating" id="rating">
                    <option value=3> 3 (strong accept)</option>
                    <option value=2> 2 (accept)</option>
                    <option value=1> 1 (weak accept)</option>
                    <option value=0 selected> 0 (borderline paper)</option>
                    <option value=-1> -1 (weak reject)</option>
                    <option value=-2> -2 (reject)</option>
                    <option value=-3> -3 (strong reject)</option>
                </select>
                <div id="form">
                    <button>Submit</button>
                </div>
                <!-- <input id ="form" class="form-control" type="submit" value="Submit">-->
            </div>

        </form>
    <?php
    }
    ?>
</head>

<body>
    <?php
    //insert support/display functions here
    $reviewerID = $_SESSION['UID'];
    if (isset($_POST['flag'])) {
        if ($_POST['flag'] == 1) {
            //retrieve $_POST vars
            $content = $_POST['content'];
            $rating = $_POST['rating'];
            $pid = $_POST['pid'];
            //require("");//require controller
            require("../controller/RcreateReviewController.php");
            //instantiate controller
            $createReviewController1 = new CreateReviewController();
            if (!$createReviewController1->createReview($content, $rating, $reviewerID, $pid)) {
                displayError("Error Creating Review!");
            }
            else {
                displaySuccess("Review Created successfully!");
            }
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