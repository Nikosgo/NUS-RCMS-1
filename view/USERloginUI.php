<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <?php
    function displayDashboard($profile)
    {
        switch ($profile) { //depend on which userProfile, display specific dashboard page
            case "SystemAdmin":
                header("Location: http://localhost/314/ui/systemAdminDashboard.php");
                break;
            case "ConferenceChair":
                header("Location: http://localhost/314/ui/ccDashboard.php");
                break;
            case "Reviewer":
                header("Location: http://localhost/314/ui/reviewerDashboard.php");
                break;
            case "Author":
                header("Location: http://localhost/314/ui/authorDashboard.php");
                break;
            default:
                echo "Unknown UserProfile";
        }
    }
    function displayError($msg)
    { //displays error message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/USERloginUI.php';</script>";
    }
    function displayLoginUI()
    {
    ?>
        <form action="../ui/USERloginUI.php" method="POST" class="row">
            <div class="col-auto">
                <input type="hidden" id="flag" name="flag" value=1>
                <label for="email" class="form-label">Email:</label><br>
                <input class="form-control" type="email" id="email" name="email" placeholder="email@email.com"><br>
                <label for="pw" class="form-label">Password:</label><br>
                <input class="form-control" type="password" id="password" name="password">
                <br>
                <input class="form-control" type="submit" value="Submit">
            </div>
        <?php
    }
        ?>
</head>

<body>
    <?php
    if (isset($_POST['flag'])) {
        if ($_POST['flag'] == 1) {
            $user_email = $_POST["email"];
            $user_password = $_POST["password"];
            require("../control/USERloginController.php");
            $loginController1 = new USERLoginController();
            if (!$result = $loginController1->validateLogin($user_email, $user_password)) {
                displayError("Login Failed! Username/Password not found!");
            } else {
                $row = $result->fetch_assoc();
                session_start();
                $_SESSION['UID'] = $row['UID'];
                $_SESSION['name'] = $row['name'];
                displayDashboard($row['userProfile']);
            }
        }
    } else {
        displayLoginUI();
    }
    ?>
</body>

</html>