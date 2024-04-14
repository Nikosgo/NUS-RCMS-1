<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php
    //insert support/display functions here
    require("../controller/AeditPaperController.php");
    $editPaperController1 = new AeditPaperController();
    $pid = $_POST['PID'];
    function displayError($msg)
    { //displays error message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/view/authorDashboard.php';</script>";
    }
    function displaySuccess($msg)
    { //displays success message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/view/authorDashboard.php';</script>";
    }
    function displayForm($result)
    {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $content = $row['content'];
        $pid = $row['PID'];
        $coAuthor = $row['coAuthorName'];
    ?>
        <form action="../view/AeditPaperUI.php" method="POST" class="row">
            <div class="col-auto">
                <input type="hidden" id="flag" name="flag" value=1>
                <input type="hidden" id="PID" name="PID" value=<?php echo $pid; ?>>
                <label for="Title" class="form-label">Title:</label><br>
                <input class="form-control" type="text" id="title" name="title" value="<?php echo $title ?>"><br>
                <label for="Content" class="form-label">Attach Content:</label><br>
                <input class="form-control" type="text" id="content" name="content" value="<?php echo $content ?>"> <br>
                <label for="title" class="form-label">Co Author:</label><br>
                <input class="form-control" type="text" id="coAuthor" name="coAuthor"value="<?php echo $coAuthor ?>"><br>

                <input class="form-control" type="submit" value="Submit">
            </div>

        </form>
    <?php
    }

    if (isset($_POST['flag'])) {
        if ($_POST['flag'] == 1) {
            //retrieve $_POST vars
            $newTitle = $_POST['title'];
            $newContent = $_POST['content'];
            $newcoAuthor = $_POST['coAuthor'];
            //$profileName = $_POST["userProfile"]; //may reuse for add another author 
            //require("");//require controller
            //instantiate controller
            //$Controller1 = new Controller();
            //if(function return false/error)
            if (!$editPaperController1->editPaper($newTitle, $newContent, $pid, $newcoAuthor)) {
                displayError("Update Failed! Please verify input fields.");
            }
            //handle error
            else {
                displaySuccess("Paper updated successfully!");
            }
            //else
            //extract and display data
        }
    } else {
        $result = $editPaperController1->searchPID($pid);
        if ($result) {
            displayForm($result);
        } else displayError("DBA Error! Unable to display Form details!");
    }
    ?>
    <br><br>
    <!-- Return back to dashboard-->
    <div class="col-auto">
        <form action="authorDashboard.php" method="POST">
            <input class="form-control" type="submit" value="Return to Dashboard">
        </form>
    </div>

</body>

</html>