<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <h1 class="text-primary">
        Reviewer Dashboard
    </h1>
    <h2>
        Welcome: <?php session_start();
                    echo $_SESSION["name"]; ?>
    </h2>

    <div class="row">
        <!-- navigation buttons to be implemented here -->
        <!-- Back Button -->
        <div class="col-auto">
            <form action="reviewerDashboard.php" method="POST">
                <input class="form-control" type="submit" value="Back">
            </form>
        </div>
    </div>
    <br />
    <div class="displayTable">
        <?php require("RviewWorkloadUI.php"); //displayWorkload()
        ?>
    </div>
    <div class="displayTable">
        <?php require("RviewAssignedPapersUI.php"); //displayAssignedPapers()
        ?>
    </div>


</body>

<!--test-->

</html>