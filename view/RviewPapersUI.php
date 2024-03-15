<html>

<head>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
    <?php
    function displayError($msg)
    { //displays error message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/authorDashboard.php';</script>";
    }
    function displayPapers($result){
        while ($row = $result->fetch_assoc()) {
            $pid = $row['PID'];
            echo "<tr>";
            echo "<td>";
            echo $row['PID'];
            echo "</td>";
            echo "<td>";
            echo $row['title'];
            echo "</td>";
            echo "<td>";
            echo $row['authorID'];
            echo "</td>";
            echo "<td>";
            echo $row['status'];
            echo "</td>";
            echo "<td>"; ?>
            <!-- WIP -->
            <form action="RviewPaperPage.php" method="POST">
                <input type="hidden" id="PID" name="PID" value="<?php echo $pid; ?>">
                <input class="form-control" type="submit" value="View">
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
        <table>
            <tr>
                <th>PaperID</th>
                <th>Title</th>
                <th>AuthorID</th>
                <th>Status</th>
                <th></th><!-- view -->
            </tr>
            <?php
            require("../control/RviewPapersController.php");
            $viewPaperController1 = new viewPapersController();
            //$title, $paper, $authorName, $file, $reviewerID, $reviewerComment
            $result = $viewPaperController1->reviewerDashboardPapers();
            if ($result) {
                displayPapers($result);
                
            } else displayError("Error: No papers to display [check DB]!");
            ?>
        </table>
    </div>
</body>

</html>