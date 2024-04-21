<html>

<head>
    <link href="style.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <h1 class="text-primary">
        View a Paper Page - Author
    </h1>

    <div class="displayPaper">
        <?php require("AviewPaperUI.php"); //displayPaper()
        ?>
    </div>

    <div class="displayReviews">
        <?php require("AviewPaperReviewsUI.php"); //displayReviews()
        ?>
    </div>

    <br><br>
    

    <!-- Back Button -->
    <div class="col-auto">
        <form action="authorDashboard.php" method="POST">
            <input class="form-control" type="submit" value="Return to Dashboard">
        </form>
    </div>

</body>