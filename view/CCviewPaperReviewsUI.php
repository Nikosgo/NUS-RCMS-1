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
    $uid = $_SESSION['UID'];
    require("../control/CCviewPaperReviewsController.php");
    function noReviews($msg)
    { //call this if no reviews
        echo "$msg";
    }
    //session already started

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
            echo $row['reviewerID'];
            echo "</td>";
            echo "<td>";
            echo $row['score'];
            echo "</td>"; ?> <!-- no paper id, already specific to one paper -->
    <?php

        }
    }
    ?>
</head>

<body>
    <div>
    </div>
    <div>
        <!-- displayReviewedPapers() -->
        <h3>This paper's reviews</h3>
        <?php
            $viewPaperReviewsController1 = new viewPaperReviewsController();
            $result = $viewPaperReviewsController1->viewPaperReviews($pid);
            if(!empty($result)){ ?>
        <table>
            <tr>
                <th>Review ID</th>
                <th>Content</th>
                <th>Rating</th>
                <th>Reviewer ID</th>
                <th>Review Score</th>
            </tr>
            <?php

            if ($result) {
                displayReviewedPapers($result);
            }
            ?>
        </table>
        <?php } else noReviews("No reviews yet!"); ?>

</body>
<!--viewing this paper's reviews -->
</html>