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
            $uid = $row['UID'];
            echo "<tr>";
            echo "<td>";
            echo $row['BID'];
            echo "</td>";
            echo "<td>";
            echo $row['PID'];
            echo "</td>";
            echo "<td>";
            echo $row['UID'];
            echo "</td>";
            echo "<td>";
            echo $assigned = $row['assigned'];
            echo "</td>";
            echo "<td>";
            echo $workload = $row['workload'];
            echo "</td>";
            echo "<td>"; ?>
            <!-- WIP -->
            <form action="CCassignBidUI.php" method="POST">
                <input type="hidden" id="pid" name="pid" value="<?php echo $row['PID']; ?>">
                <input type="hidden" id="uid" name="uid" value="<?php echo $row['UID']; ?>">
                <input class="form-control" type="submit" value="Assign" <?php if($assigned >= $workload) echo 'disabled'?>>
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
                <th>BidID</th>
                <th>PaperID</th>
                <th>ReviewerID</th>
                <th>Reviewer Assigned Papers</th>
                <th>Reviewer Preferred Workload</th>
                <th></th><!-- Assign -->
            </tr>
            <?php
            require("../control/CCviewBidsController.php");
            $viewBidController1 = new viewBidsController();
            //
            $result = $viewBidController1->viewReadyAssign();
            if ($result) {
                displayTable($result);
            } else displayError("Error: No bids found!");
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