<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <h1 class="text-primary">
        Author Dashboard
    </h1>
    <h2>
        Welcome: <?php session_start();
                    echo $_SESSION["name"]; ?>
    </h2>

    <div class="row">
        <!-- navigation buttons to be implemented here -->
        <!-- Create New Paper Button -->
        <div class="col-auto">
            <form action="AcreatePaperUI.php" method="POST">
                <input class="form-control" type="submit" value="Create New Paper">
            </form>
        </div>
        <!-- View My Papers Button -->
        <div class="col-auto">
            <form action="authorDashboard_myPapers.php" method="POST">
                <input class="form-control" type="submit" value="View My Papers">
            </form>
        </div>
        <!-- Search Papers Button -->
        <div class="col-auto">
            <form action="AsearchPaperUI.php" method="POST">
                <input class="form-control" type="submit" value="Search Papers">
            </form>
        </div>
        <!-- Logout Button -->
        <div class="col-auto">
            <form action="USERlogoutUI.php" method="POST">
                <input class="form-control" type="submit" value="Logout">
            </form>
        </div>
    </div>
    <br/>
    <div class="displayTable">
        <?php require("AviewPapersUI.php"); //displayPapers()?>
    </div>

</body>

<!--test-->

</html>