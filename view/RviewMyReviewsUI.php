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
    <?php
    session_start();
    $uid = $_SESSION['UID'];
    require("../control/RviewMyReviewsController.php");
    function displayError($msg)
    { //displays error message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/reviewerDashboard.php';</script>";
    }
    function displayReviewedPapers($result)
    {
        while ($row = $result->fetch_assoc()) {
            $pid = $row['PID'];
            $rid = $row['RID'];
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
            echo "<td>"; ?> <!-- no reviewer ID because this is already specific to one reviewer -->
            <form action="RviewPaperPage.php" method="POST">
                <input type="hidden" id="PID" name="PID" value="<?php echo $pid; ?>">
                <input type="hidden" id="RID" name="RID" value="<?php echo $rid; ?>">
                <input class="form-control" type="submit" value="View">
            </form>
            <?php
            echo "</td>";
            echo "<td>"; ?>
            <form action="ReditReviewUI.php" method="POST">
                <input type="hidden" id="PID" name="PID" value="<?php echo $pid; ?>">
                <input type="hidden" id="RID" name="RID" value="<?php echo $rid; ?>">
                <input class="form-control" type="submit" value="Edit Review">
            </form>
            <?php
            echo "</td>";
            echo "<td>"; ?>
            <form action="RdeleteReviewUI.php" method="POST">
                <input type="hidden" id="PID" name="PID" value="<?php echo $pid; ?>">
                <input type="hidden" id="RID" name="RID" value="<?php echo $rid; ?>">
                <input class="form-control" type="submit" value="Delete Review">
            </form>
    <?php
            echo "</td>";
            echo "</tr>";
        }
    }
    ?>
</head>

<body>
    <div>
    </div>
    <div>
        <!-- displayReviewedPapers() -->
        <h3>My Reviews</h3>
        <table>
            <tr>
                <th>Review ID</th>
                <th>Content</th>
                <th>Rating</th>
                <th>Paper ID</th>
                <th>View Paper</th>
                <th>Edit Review</th>
                <th>Delete Review</th>
            </tr>
            <?php

            $viewMyReviewsController1 = new viewMyReviewsController();
            $result = $viewMyReviewsController1->viewMyReviews($uid);
            if ($result) {
                displayReviewedPapers($result);
            } else displayError("Error: No reviews found!");
            ?>
        </table>
        <!-- Back Button -->
        <div class="col-auto">
            <form action="reviewerDashboard.php" method="POST">
                <input class="form-control" type="submit" value="Return to Dashboard">
            </form>
        </div>
    </div>
</body>
<!--viewMyreviews -->
</html>