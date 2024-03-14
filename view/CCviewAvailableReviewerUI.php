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
            function noReviewers($msg)
            { //displays error message
                echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/ccDashboard.php';</script>";
            }
            function displayReviewers($result){
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>";
                    echo $row['UID'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['name'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['userProfile'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['assigned'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['workload'];
                    echo "</td>";
                    echo "</tr>";
                }
            }
        ?>
    </head>
    <body>
    <div>
        <h2> Available Reviewers </h2>
        <table>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Role</th>
                <th># of Assigned</th>
                <th>Workload Limit</th>
            </tr>
            <?php

            require("../control/CCviewAvailableReviewerController.php");
            $viewReviewerController1 = new CCviewAvailableReviewerController();
            $result = $viewReviewerController1->viewAvailReviewers();
            if ($result) {
                displayReviewers($result);
                
            } else noReviewers("Error: No available reviewers!");
            ?>
        </table>
    </div>
    <br><br>
        <div class="row">
            <div class="col-auto">
                <form action="CCviewAssignedUI.php" method="POST">
                    <input class="form-control" type="submit" value="Return to Assigned Papers">
                </form>
            </div>
        </div>
    </body>
</html>