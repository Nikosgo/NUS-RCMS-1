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
    function displayError($msg)
    { //displays error message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost:8080/view/SAcreateUserProfileUI.php';</script>";
    }
    function displaySuccess($msg)
    { //displays success message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost:8080/view/systemAdminDashboard_userProfiles.php';</script>";
    }

    if (isset($_POST['flag'])) {
        if ($_POST['flag'] == 1) {
            //retrieve $_POST vars
            $profileName = $_POST["profileName"];
            //require("");//require controller
            require("../controller/SAcreateUserProfileController.php");
            //instantiate controller
            //$Controller1 = new Controller();
            $createUserProfileController1 = new SACreateUserProfileController();
            //if(function return false/error)
            if (!$createUserProfileController1->createUserProfile($profileName)) {
                displayError("User Profile Creation Failed! Check Inputs!");
            }
            else {
                displaySuccess("User Profile Creation Sucess!");
            }
            //extract and display data
        }
    } else {
    ?>
        <form action="../view/SAcreateUserProfileUI.php" method="POST" class="row">
            <div class="col-auto">
                <input type="hidden" id="flag" name="flag" value=1>
                <label for="profileName" class="form-label">Profile Name:</label><br>
                <input class="form-control" type="text" id="profileName" name="profileName"><br>
                <div id="form">
                    <button>Submit</button>
                </div>
                <!-- <input id ="form" class="form-control" type="submit" value="Submit">-->
            </div>

        </form>
        <form class="row" id="forml" action="systemAdminDashboard_userProfiles.php">
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
    ?>
</body>

</html>