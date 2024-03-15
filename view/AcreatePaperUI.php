<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <?php
    function displayError($msg)
    { //displays error message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/AcreatePaperUI.php';</script>";
    }
    function displaySuccess($msg)
    { //displays success message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/authorDashboard.php';</script>";
    }
    function displayForm(){
        ?>
        <!-- 
        form action to self
        set flag
        take in user input
    -->
        <form action="../ui/AcreatePaperUI.php" method="POST" class="row">
            <div class="col-auto">
                <input type="hidden" id="flag" name="flag" value=1>
                <label for="title" class="form-label">Title:</label><br>
                <input class="form-control" type="text" id="title" name="title"><br>
                <label for="content" class="form-label">Content:</label><br>
                <input class="form-control" type="text" id="content" name="content" placeholder="Write Content Here"><br>
                <label for="title" class="form-label">Co Author:</label><br>
                <input class="form-control" type="text" id="coAuthor" name="coAuthor"><br>

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


    if (isset($_POST['flag'])) {
        if ($_POST['flag'] == 1) {
            //retrieve $_POST vars
            $title = $_POST['title'];
            $content = $_POST['content'];
            $authorID = $_SESSION['UID'];
            $coAuthor = $_POST['coAuthor'];
            //$profileName = $_POST["userProfile"]; //may reuse for add another author 
            //require("");//require controller
            require("../control/AcreatePaperController.php");
            //instantiate controller
            $createPaperController1 = new CreatePaperController();
            //$Controller1 = new Controller();
            //if(function return false/error)
            if (!$createPaperController1->createPaper($title, $content, $authorID, $coAuthor)) {
                displayError("Upload Failed! Please verify input fields.");
            }
            //handle error
            else {
                displaySuccess("Paper uploaded successfully!");
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
        <form action="authorDashboard.php" method="POST">
            <input class="form-control" type="submit" value="Return to Dashboard">
        </form>
    </div>

</body>

</html>