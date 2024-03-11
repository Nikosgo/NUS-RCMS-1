<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php
    //insert support/display functions here
    $uid = $_POST["UID"];
    require("../control/SAeditUserController.php");
    $editUserController1 = new SAeditUserController();
    


    function displayError($msg)
    { //displays error message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/systemAdminDashboard.php';</script>";
    }
    function displaySuccess($msg)
    { //displays success message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/systemAdminDashboard.php';</script>";
    }
    function displayForm($result)
    {
        $row = $result->fetch_assoc();
        $uid = $row['UID'];
        $name = $row['name'];
        $email = $row['email'];
        $userProfile = $row['userProfile'];
        $password = $row['password'];
    ?>
        <!-- 
        form action to self
        set flag
        take in user input
    -->
        <form action="../ui/SAeditUserUI.php" method="POST" class="row">
            <div class="col-auto">
                <input type="hidden" id="UID" name="UID" value=<?php echo $uid; ?>>
                <input type="hidden" id="flag" name="flag" value=1>
                <label for="name" class="form-label">Name:</label><br>
                <input class="form-control" type="text" id="name" name="name" value="<?php echo $name ?>"><br>
                <label for="email" class="form-label">Email:</label><br>
                <input class="form-control" type="email" id="email" name="email" value="<?php echo $email ?>"><br>
                <label for="password" class="form-label">Password:</label><br>
                <input class="form-control" type="password" id="password" name="password" value="<?php echo $password ?>" required><br>
                <label for="userProfile">User Profile:</label>
                <select name="userProfile" id="userProfile">
                    <?php
                    require("../control/SAviewUserProfileController.php");
                    $viewUserProfileController = new SAviewUserProfileController();
                    $result1 = $viewUserProfileController->viewUserProfile();
                    //debug_to_console($result1);
                    if ($result1->num_rows > 0) {
                        while ($row1 = $result1->fetch_assoc()) { ?>
                            <option value=<?php echo $row1['userProfile'];
                                            if ($userProfile == $row1['userProfile']) {
                                                echo " selected";
                                            }
                                            ?>>
                                <?php echo $row1['userProfile']; ?>
                            </option>
                    <?php
                        }
                    }
                    //else echo "<option value='error' selected>Error</option>";
                    ?>
                </select><br>
                <input class="form-control" type="submit" value="Submit">
            </div>

        </form>
    <?php
    }


    if (isset($_POST['flag'])) {
        if ($_POST['flag'] == 1) {
            //retrieve $_POST vars
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $profileName = $_POST["userProfile"];

            //require("");//require controller
            //require("../control/editUserController.php");
            //instantiate controller
            //$Controller1 = new Controller();
            //$editUserController1 = new EditUserController();
            //if(function return false/error)
            if (!$editUserController1->editUser($name, $email, $password, $profileName, $uid)) {
                displayError("Edit User Fail! Check input fields!");
            }
            //handle error
            else {
                displaySuccess("Edit User Success!");
            }
            //else
            //extract and display data
        }
    } else { //displayform()
        $result = $editUserController1->searchUID($uid);
        if($result){
            displayForm($result);
        }
        else displayError("Error displaying user! [DBA error]");

    }
    ?>
</body>

</html>