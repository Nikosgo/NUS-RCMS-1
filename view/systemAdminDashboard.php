<?php
session_start();
?>

<html>
<head>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <h1 class="text-primary">
        System Admin Dashboard
    </h1>
    <h2>
        Welcome: <?php echo $_SESSION["name"]; ?>
    </h2>

    <div class="row">
        <!-- navigation buttons to be implemented here -->
        <!-- Create New User Button -->
        <div class="col-auto">
            <form action="SAcreateUserUI.php" method="POST">
                <div id="form">
                    <button>Create User Account</button>
                </div>
                <!-- <input id ="form" class="form-control" type="submit" value="Create User Account"> -->
            </form>
        </div>
        <!-- Search Users Button -->
        <div class="col-auto">
            <form action="SAsearchUserUI.php" method="POST">
            <div id="form">
                    <button>Search Users</button>
                </div>
                <!-- <input class="form-control" type="submit" value="Search Users"> -->
            </form>
        </div>
        <!-- Manage User Profiles Button -->
        <div class="col-auto">
            <form action="SystemAdminDashboard_userProfiles.php" method="POST">
            <div id="form">
                    <button>View User Profiles</button>
                </div>
                <!-- <input class="form-control" type="submit" value="View User Profiles"> -->
            </form>
        </div>
        <!-- Logout Button -->
        <div class="col-auto">
            <form action="USERlogoutUI.php" method="POST">
            <div id="forml">
                    <button>Log Out</button>
                </div>
                <!-- <div id="forml">
                    <button>Log Out</button>
                </div>
                <input class="form-control" type="submit" value="Logout"> -->
            </form>
        </div>
    </div>
    <div class="displayTable">
        <?php require("SAviewUserUI.php"); //displayUsers()?>
    </div>
</body>

<!--test-->

</html>