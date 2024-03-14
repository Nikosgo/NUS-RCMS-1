<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <h1 class="text-primary">
        View a Paper Page - Conference Chair
    </h1>

    <div class="displayPaper">
        <?php require("CCviewPaperUI.php"); //displayPaper()
        ?>
    </div>

    <div class="displayReviews">
        <?php require("CCviewPaperReviewsUI.php"); //displayReviews()
        ?>
    </div>

    <br><br>
    
    <!-- Accept Paper Button -->
    <form action="../ui/CCacceptPaperUI.php" method="POST" class="row">
        <div class="col-auto">
            <input type="hidden" id="uid" name="uid" value="<?php echo $GLOBALS['authorID'] ?>">
            <input type="hidden" id="pid" name="pid" value="<?php echo $pid ?>">
            <input class="form-control" type="submit" value="Accept Paper" <?php if($status != 'reviewed'){echo 'disabled';}?>>
        </div>
    </form>

    <!-- Reject Paper Button -->
    <form action="../ui/CCrejectPaperUI.php" method="POST" class="row">
        <div class="col-auto">
            <input type="hidden" id="uid" name="uid" value="<?php echo $GLOBALS['authorID'] ?>">
            <input type="hidden" id="pid" name="pid" value="<?php echo $pid ?>">
            <input class="form-control" type="submit" value="Reject Paper" <?php if($status != 'reviewed'){echo 'disabled';}?>>
        </div>
    </form>
    
    <!-- Back Button -->
    <div class="col-auto">
        <form action="ccDashboard.php" method="POST">
            <input class="form-control" type="submit" value="Return to Dashboard">
        </form>
    </div>

</body>
