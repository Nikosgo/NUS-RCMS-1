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
    function displayForm(){
        ?>
        <form action="../view/SAcreateUserUI.php" method="POST" class="row">
            <div class="col-auto">
                <input type="hidden" id="flag" name="flag" value=1>
                <label for="name" class="form-label">Name:</label><br>
                <input class="form-control" type="text" id="name" name="name"><br>
                <label for="email" class="form-label">Email:</label><br>
                <input class="form-control" type="email" id="email" name="email" placeholder="username"><br>
                <label for="password" class="form-label">Password:</label><br>
                <input class="form-control" type="password" id="password" name="password" placeholder="password"><br>
                <label for="userProfile">User Profile:</label>
                <select name="userProfile" id="userProfile">
                    <?php
                    require("../controller/SAviewUserProfileController.php");
                    $viewUserProfileController = new SAviewUserProfileController();
                    $result = $viewUserProfileController->viewUserProfile();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <option value=<?php echo $row['userProfile']; ?>><?php echo $row['userProfile']; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select><br>
                <div id="form">
                    <button>Submit</button>
                </div>
                <!-- <input id ="form" class="form-control" type="submit" value="Submit">-->
                <!-- <div id="forml" action="systemAdminDashboard.php">
                    <button>Back</button>
                </div> -->
                <!-- <input id ="form" class="form-control" type="submit" value="Submit">-->
            </div>
        </form>
        <form class="row" id="forml" action="systemAdminDashboard.php">
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
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost:8080/view/SAcreateUserUI.php';</script>";
    }
    function displaySuccess($msg)
    { //displays success message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost:8080/view/systemAdminDashboard.php';</script>";
    }

    if (isset($_POST['flag'])) {
        if ($_POST['flag'] == 1) {
            //retrieve $_POST vars
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $profileName = $_POST["userProfile"];
            //require("");//require controller
            require("../controller/SAcreateUserController.php");
            //instantiate controller
            $createUserController1 = new SACreateUserController();
            //$Controller1 = new Controller();
            //if(function return false/error)
            if (!$createUserController1->createUser($name, $email, $password, $profileName)) {
                displayError("User Account Creation Failed! Check Inputs!");
            }
            //handle error
            else {
                displaySuccess("User Account Creation Success!");
            }
        }
    } else {
        displayForm();
    ?>
       
    <?php
    }
    ?>
</body>

</html>