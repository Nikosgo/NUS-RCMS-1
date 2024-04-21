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
		echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/NUS-RCMS-1/view/systemAdminDashboard.php';</script>";
	}
	function displaySuccess($msg)
	{ //displays success message
		echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/NUS-RCMS-1/view/systemAdminDashboard.php';</script>";
	}

    $uid = $_POST['UID'];
    require("../controller/SAdeleteUserController.php");
    $SAdeleteUserController1 = new SAdeleteUserController();

    if(!$SAdeleteUserController1->deleteUser($uid)){
        displayError("Delete User Fail!");
    }
    //handle error
    else{
        displaySuccess("Delete User Success!");
    }

    if (isset($_POST['flag'])) {
        if ($_POST['flag'] == 1) {
            //retrieve $_POST vars
            //require("");//require controller
            //instantiate controller
            //$Controller1 = new Controller();
            //if(function return false/error)
            //handle error
            //else
            //extract and display data
        }
    } else {
    ?>
        <!-- 
        form action to self
        set flag
        take in user input
    -->
        <!--
    <form action="../view/SAdeleteUserUI.php" method="POST" class="row">
        <div class="col-auto">
            <input type="hidden" id="flag" name="flag" value=1>
            <br>
            <div id="form">
                    <button>Submit</button>
                </div>
                <!-- <input id ="form" class="form-control" type="submit" value="Submit">-->
        </div>

    </form>
    <form action="debug_create_DB_placeholderUser.php" method="POST">
        <input class="form-control" type="submit" value="Create_DB">
    </form>
    -->
    <?php
    }
    ?>
</body>

</html>