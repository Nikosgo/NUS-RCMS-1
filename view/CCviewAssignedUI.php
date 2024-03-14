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
    function displayError($msg)
    { //displays error message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/ccDashboard.php';</script>";
    }
    function displayTable($result){
        while ($row = $result->fetch_assoc()) {
            $pid = $row['PID'];
            $reviewerID = $row['reviewerID'];
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
            echo "<td>";
            echo $row['reviewerID'];
            echo "</td>";
            echo "<td>"; ?>
            <!-- WIP -->
            <form action="CCdeleteAssignmentUI.php" method="POST">
                <input type="hidden" id="pid" name="pid" value="<?php echo $pid; ?>">
                <input type="hidden" id="reviewerID" name="reviewerID" value="<?php echo $reviewerID; ?>">
                <input class="form-control" type="submit" value="Delete">
            </form>
    <?php
            echo "</td>";
            echo "<td>"; ?>
            <!-- WIP -->
            <form action="CCeditAssignUI_dashboard.php" method="POST">
                <input type="hidden" id="pid" name="pid" value="<?php echo $pid; ?>">
                <input type="hidden" id="reviewerID" name="reviewerID" value="<?php echo $reviewerID; ?>">
                <input class="form-control" type="submit" value="Edit">
            </form>
    <?php
            echo "</td>";
            echo "</tr>";
        }
    }
    ?>
</head>

<body>
    <h2> All Assigned Papers </h2>
    <div>
        <table>
            <tr>
                <th>Paper ID</th>
                <th>Title</th>
                <th>Author ID</th>
                <th>Status</th>
                <th>Reviewer ID</th>
                <th></th><!-- Delete -->
                <th></th><!-- Edit -->
            </tr>
            <?php
            require("../control/CCviewAssignedController.php");
            $viewAssignedController1 = new CCviewAssignedController();
            $result = $viewAssignedController1->viewAssignedPapers();
            if ($result) {
                displayTable($result);
            } else displayError("Error: No Assigned Papers Currently");
            ?>
        </table>
    </div>
    <br>
    <div class="row">
            <div class="col-auto">
                <form action="ccDashboard.php" method="POST">
                    <input class="form-control" type="submit" value="Return to dashboard">
                </form>
            </div>
        </div>
</body>

</html>
