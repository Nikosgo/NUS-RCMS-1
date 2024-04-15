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
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/NUS-RCMS-1/view/authorDashboard.php';</script>";
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
            echo $row['authorName'];
            echo "</td>";
            echo "<td>";
            echo $row['coAuthorName'];
            echo "</td>";
            echo "<td>";
            echo $row['status'];
            echo "</td>";
            echo "<td>"; ?>
            <!-- WIP -->
            <form action="AviewPaperPage.php" method="POST">
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
                <th>Author</th>
                <th>Co Author</th>
                <th>Status</th>
                <th></th><!-- view -->
            </tr>
            <?php

            require("../controller/AviewPapersController.php");
            $viewPaperController1 = new viewPapersController();
            //$title, $paper, $authorName, $file, $reviewerID, $reviewerComment
            $result = $viewPaperController1->viewPapers();
            if ($result) {
                displayPapers($result);
                
            } else displayError("Error: No papers to display [check DB]!");
            ?>
        </table>
    </div>
</body>

</html>