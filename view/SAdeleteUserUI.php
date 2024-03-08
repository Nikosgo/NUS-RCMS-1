<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php
    //insert support/display functions here
    function displayError($msg)
	{ //displays error message
		echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/systemAdminDashboard.php';</script>";
	}
	function displaySuccess($msg)
	{ //displays success message
		echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/systemAdminDashboard.php';</script>";
	}

    $uid = $_POST['UID'];
    require("../control/SAdeleteUserController.php");
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
    <form action="../ui/SAdeleteUserUI.php" method="POST" class="row">
        <div class="col-auto">
            <input type="hidden" id="flag" name="flag" value=1>
            <br>
            <input class="form-control" type="submit" value="Submit">
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