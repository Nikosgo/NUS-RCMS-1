<?php session_start(); ?>
<html>
<head>
    <link href="style.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <h1 class="text-primary">
        Reviewer Dashboard
    </h1>
    <h2>
        Welcome: <?php echo $_SESSION["name"]; ?>
    </h2>

    <div class="row">
        <!-- navigation buttons to be implemented here -->
        <!-- View My Bids Button -->
        <div class="col-auto">
            <form action="RviewMyBidsUI.php" method="POST">
                <div id="form">
                    <button>View My Bids</button>
                </div>
            </form>
        </div>

        <!-- View Assigned Papers Button -->
        <div class="col-auto">
            <form action="reviewerDashboard_ViewAssignedPapers.php" method="POST">
                <div id="form">
                    <button>My Assigned Papers</button>
                </div>
            </form>
        </div>

        <!-- Search Papers Button -->
        <div class="col-auto">
            <form action="RsearchPaperUI.php" method="POST">
                <div id="form">
                    <button>Search Papers</button>
                </div>
            </form>
        </div>

        <!-- Manage Workload Button -->
        <div class="col-auto">
            <form action="ReditWorkloadUI.php" method="POST">
                <div id="form">
                    <button>Edit Workload</button>
                </div>
            </form>
        </div>
        <!-- Manage Reviews Button -->
        <div class="col-auto">
            <form action="RviewMyReviewsUI.php" method="POST">
                <div id="form">
                    <button>My Reviews</button>
                </div>
            </form>
        </div>
        
        <!-- Search Reviews Button -->
        <div class="col-auto">
            <form action="RsearchReviewsUI.php" method="POST">
                <div id="form">
                    <button>Search Reviews</button>
                </div>
            </form>
        </div>

        <!-- Logout Button -->
        <div class="col-auto">
            <form action="USERlogoutUI.php" method="POST">
                <div id="forml">
                    <button>Log Out</button>
                </div>
            </form>
            </form>
        </div>
    </div>
    <br />
    <div class="displayTable">
        <?php require("RviewPapersUI.php");
        ?>
    </div>

</body>

</html>