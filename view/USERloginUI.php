<?php
ob_start();
?>
<html>
<head>
    <link href="styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <style>
        h2 {
            font-family: 'Arial Black', sans-serif;
            font-size: 28px;
            color: #333;
            text-shadow: 2px 2px 2px #888;
            text-align: center;
            border-bottom: 2px solid #ccc; /* Adding a decorative border bottom */
            margin-bottom: 20px; /* Adding some margin for spacing */
            margin-top: 20px; /* Adding some margin for spacing */
        }
        </style>
    <?php
    function displayDashboard($profile)
    {
        switch ($profile) { //depend on which userProfile, display specific dashboard page
            case "SystemAdmin":
                header("Location: http://localhost:8080/view/systemAdminDashboard.php");
                break;
            case "ConferenceChair":
                header("Location: http://localhost:8080/view/ccDashboard.php");
                break;
            case "Reviewer":
                header("Location: http://localhost:8080/view/reviewerDashboard.php");
                break;
            case "Author":
                header("Location: http://localhost:8080/view/authorDashboard.php");
                break;
            default:
                echo "Unknown UserProfile";
        }
        exit;
    }
    function displayError($msg)
    { //displays error message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost:8080/view/USERloginUI.php';</script>";
    }
    function displayLoginUI()
    {
        ?>
        <h2>Research Conference Management System</h2>
        <div id="login">
            <form action="../view/USERloginUI.php" method="POST" >
            <h1 >Log In</h1>
                <div class="col-auto">
                    <input type="hidden" id="flag" name="flag" value=1>
                    <input class="form-control" type="email" id="email" name="email" placeholder="username">
                    <input class="form-control" type="password" id="password" name="password" placeholder="password">
                    <button>Sign in</button>
                    <!-- <div id="form">
                    <button>Submit</button>
                </div>
                <input id ="form" class="form-control" type="submit" value="Submit">-->
                </div>
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
            require("../controller/USERloginController.php");
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