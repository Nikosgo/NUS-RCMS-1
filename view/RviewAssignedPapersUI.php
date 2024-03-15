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
    require("../control/RviewAssignedPapersController.php");
    if (!function_exists("displayError")) {
        function displayError($msg)
        { //displays error message
            echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/reviewerDashboard.php';</script>";
        }
    }
    function displayAssignedPapers($result)
    {
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
            echo $row['content'];
            echo "</td>";
            echo "<td>";
            echo $row['authorID'];
            echo "</td>";
            echo "<td>";
            echo $row['status'];
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
    }
    ?>
</head>

<body>
    <div>
        <!-- displayAssignedPapers() -->
        <h3>My Assigned Papers</h3>
        <table>
            <tr>
                <th>PaperID</th>
                <th>Title</th>
                <th>File</th>
                <th>AuthorID</th>
                <th>Status</th>
                <th></th><!-- view -->
            </tr>
            <?php

            $viewMyAssignedPapersController1 = new ViewAssignedPapersController();
            //$title, $paper, $authorName, $file, $reviewerID, $reviewerComment
            $result = $viewMyAssignedPapersController1->viewMyAssignedPapers($uid);
            if ($result) {
                displayAssignedPapers($result);
            } else displayError("No papers Assigned!");
            ?>
        </table>
        
    </div>
</body>

</html>