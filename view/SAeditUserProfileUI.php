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
    require("../controller/SAeditUserProfileController.php");
    function displayForm($result){
        $row = $result->fetch_assoc();

        $userProfile = $row["userProfile"];
        $upid = $row["UPID"];
        ?>
        <form action="../view/SAeditUserProfileUI.php" method="POST" class="row">
            <div class="col-auto">
                <input type="hidden" id="UPID" name="UPID" value="<?php echo $upid ?>">
                <input type="hidden" id="flag" name="flag" value=1>
                <label for="profileName" class="form-label">Profile Name:</label><br>
                <input class="form-control" type="text" id="profileName" name="profileName" value="<?php echo $userProfile ?>"><br>
                <div id="form">
                    <button>Submit</button>
                </div>
                <!-- <input id ="form" class="form-control" type="submit" value="Submit">-->
            </div>

        </form>
        <form class="row" id="forml" action="SystemAdminDashboard_userProfiles.php">
            <div class="col-auto">
                <button type="submit">Back</button>
            </div>
        </form>
        <script>
            document.getElementById("forml").addEventListener("submit", function(event){
                event.preventDefault(); // Prevent the default form submission
                window.location.href = this.action; // Redirect to systemAdminDashboard.php
            });
        </script>
        <?php
    }

    function displayError($msg)
    { //displays error message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost:8080/view/systemAdminDashboard_userProfiles.php';</script>";
    }
    function displaySuccess($msg)
    { //displays success message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost:8080/view/systemAdminDashboard_userProfiles.php';</script>";
    }

    if (isset($_POST['flag'])) {
        if ($_POST['flag'] == 1) {
            //retrieve $_POST vars
            $upid = $_POST["UPID"];
            $profileName = $_POST["profileName"];
            //require("");//require controller
            
            //instantiate controller
            //$Controller1 = new Controller();
            $editUserProfileController1 = new SAeditUserProfileController();
            //if(function return false/error)
            //handle error
            if (!$editUserProfileController1->editUserProfile($profileName, $upid)) {
                displayError("Edit User Profile Failed! Check input fields!");
            }
            else {
                displaySuccess("Edit User Profile Success!");
            }
            
        }
    } else {
        $upid = $_POST["UPID"];
        $editUserProfileController1 = new SAeditUserProfileController();
        $result = $editUserProfileController1->viewUserProfile($upid);
        if($result) displayForm($result);
        else displayError("Display form Error! [DBA error]")
    ?>
     
        
    <?php
    }
    ?>
</body>

</html>