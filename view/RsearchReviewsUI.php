<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?php
    //insert support/display functions here
    function displayError($msg)
    { //displays error message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/reviewerDashboard.php';</script>";
    }
    function displayTable($result)
    { ?>
        <h2>Search Review Results</h2>
        <table>
            <tr>
                <th>Review ID</th>
                <th>Content</th>
                <th>Rating</th>
                <th>PaperID</th>
                <th></th><!-- view -->
            </tr>
            <?php

            while ($row = $result->fetch_assoc()) {
                $rid = $row['RID'];
                $pid = $row['PID'];
                echo "<tr>";
                echo "<td>";
                echo $row['RID'];
                echo "</td>";
                echo "<td>";
                echo $row['content'];
                echo "</td>";
                echo "<td>";
                echo $row['rating'];
                echo "</td>";
                echo "<td>";
                echo $row['PID'];
                echo "</td>";
                echo "<td>"; ?>
                <form action="RviewPaperPage.php" method="POST">
                    <input type="hidden" id="PID" name="PID" value="<?php echo $pid; ?>">
                    <input class="form-control" type="submit" value="View">
                </form>
            <?php
                echo "</td>";
                echo "</tr>";
            }

            ?>
        </table>
        <!-- Back button -->
        <div class="row">
            <div class="col-auto">
                <form action="reviewerDashboard.php" method="POST">
                    <input class="form-control" type="submit" value="Back">
                </form>
            </div>
        </div>
    <?php
    }

    if (isset($_POST['flag'])) {
        if ($_POST['flag'] == 1) {
            //retrieve $_POST vars
            $pid = $_POST['pid'];
            //require("");//require controller
            //instantiate controller
            //$Controller1 = new Controller();
            require("../control/RsearchReviewsController.php");
            $RsearchReviewsController1 = new RsearchReviewsController();
            if ($result = $RsearchReviewsController1->searchReview($pid)) {
                displayTable($result);
            } else displayError("Error: No reviews found!");
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
        <!-- displaySearchForm -->
        <h2>Search Reviews</h2>
        <form action="../ui/RsearchReviewsUI.php" method="POST" class="row">
            <div class="col-auto">
                <input type="hidden" id="flag" name="flag" value=1>
                <label for="pid" class="form-label">Search by PID, RID or content:</label><br>
                <input class="form-control" type="text" id="pid" name="pid" placeholder="query"><br>
                <input class="form-control" type="submit" value="Search">
            </div>

        </form>
        <!-- Back button -->
        <div class="row">
            <div class="col-auto">
                <form action="reviewerDashboard.php" method="POST">
                    <input class="form-control" type="submit" value="Back">
                </form>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>