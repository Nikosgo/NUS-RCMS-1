<html>
<head>
    <link href="style.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php
    //insert support/display functions here
    require("../controller/RviewPaperController.php");
    $uid = $_SESSION['UID'];
    $viewPaperController1 = new RviewPaperController();
    $pid = $_POST['PID'];
    function displayError($msg)
    { //displays error message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost:8080/view/reviewerDashboard.php';</script>";
    }
    function displayPaper($result)
    {
        $row = $result->fetch_assoc();
        $uid = $_SESSION['UID'];
        $pid = $_POST['PID'];
        $title = $row['title'];
        $content = $row['content'];
        $status = $row['status'];
        $authorName = $row['authorName'];
        $coAuthor = $row['coAuthorName'];
    ?>
        <!-- 
        form action to self
        set flag
        take in user input
    -->
        <form class="row">
            <div class="col-auto">
                <input type="hidden" id="uid" name="uid" value="<?php echo $uid ?>">
                <input type="hidden" id="pid" name="pid" value="<?php echo $pid ?>">
                <label for="Title" class="form-label">Title:</label><br>
                <input class="form-control" type="text" id="title" name="title" value="<?php echo $title ?>" disabled><br>
                <label for="Title" class="form-label">Author:</label><br>
                <input class="form-control" type="text" id="title" name="title" value="<?php echo $authorName ?>" disabled><br>
                <label for="Title" class="form-label">Co-Author:</label><br>
                <input class="form-control" type="text" id="title" name="title" value="<?php echo $coAuthor ?>" disabled><br>
                <label for="Content" class="form-label">Content:</label><br>
                <input class="form-control" type="text" id="content" name="content" value="<?php echo $content ?>" disabled> <br>
                <label for="Status" class="form-label">Status:</label><br>
                <input class="form-control" type="text" id="Status" name="Status" value="<?php echo $status ?>" disabled> <br>
            </div>
        </form>
        <!-- Create Bid Button -->
        <form action="../view/RcreateBidUI.php" method="POST" class="row">
            <div class="col-auto">
                <input type="hidden" id="uid" name="uid" value="<?php echo $uid ?>">
                <input type="hidden" id="pid" name="pid" value="<?php echo $pid ?>">
                <input class="form-control" type="submit" value="Bid" <?php if ($status != 'pending' && $status != 'reviewed') {
                                                                            echo 'disabled';
                                                                        } ?>>
                <!-- <div id="forml">
                    <button <?php if ($status != 'pending' && $status != 'reviewed') { echo 'disabled';} ?>>Bid</button>
                </div> -->
            </div>
        </form>
        <!-- Create Review Button -->
        <form action="../view/RcreateReviewUI.php" method="POST" class="row">
            <div class="col-auto">
                <input type="hidden" id="uid" name="uid" value="<?php echo $uid ?>">
                <input type="hidden" id="pid" name="pid" value="<?php echo $pid ?>">
                <input class="form-control" type="submit" value="Create Review" <?php if ($status != 'assigned') {
                                                                                    echo 'disabled';
                                                                                } ?>>
                <!-- <div id="forml">
                    <button <?php if ($status != 'assigned') {echo 'disabled';} ?>>Create Review</button>
                </div> -->
            </div>
        </form>
        <br><br>
       <?php
    }

    $result = $viewPaperController1->viewPaper($pid);
    if ($result) displayPaper($result);
    else displayError("Error displaying paper!");
        ?>
</body>

</html>