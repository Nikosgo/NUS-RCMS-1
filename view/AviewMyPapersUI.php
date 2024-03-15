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
            echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/authorDashboard.php';</script>";
        }
        function displayTable($result){
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
                echo $row['authorName'];
                echo "</td>";
                echo "<td>";
                echo $row['coAuthorName'];
                echo "</td>";
                echo "<td>";
                echo $row['status'];
                echo "</td>";
                echo "<td>"; ?>
                <form action="AviewPaperPage.php" method="POST">
                    <input type="hidden" id="PID" name="PID" value="<?php echo $pid; ?>">
                    <input class="form-control" type="submit" value="View">
                </form>
                <?php
                echo "</td>";
                echo "<td>"; ?>
                <form action="AeditPaperUI.php" method="POST">
                    <input type="hidden" id="PID" name="PID" value="<?php echo $pid; ?>">
                    <input class="form-control" type="submit" value="Edit" <?php if($row['status'] != 'pending'){echo 'disabled';}?>>
                </form>
                <?php
                echo "</td>";
                echo "<td>"; ?>
                <form action="AdeletePaperUI.php" method="POST">
                    <input type="hidden" id="PID" name="PID" value="<?php echo $pid; ?>">
                    <input class="form-control" type="submit" value="Delete" <?php if($row['status'] != 'pending'){echo 'disabled';}?>>
                </form>
        <?php
                echo "</td>";
                echo "</tr>";
            }
        }
    ?>
</head>

<body>
    <h2>Your submitted papers</h1>
        <br />
        <div>
            <table>
                <tr>
                    <th>PaperID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Author</th>
                    <th>Co Author</th>
                    <th>Status</th>
                    <th></th><!-- View -->
                    <th></th><!-- Edit Paper -->
                    <th></th><!-- delete -->
                </tr>
                <?php
                require("../control/AviewMyPapersController.php");
                $viewMyPaperController1 = new viewMyPapersController();
                //$title, $paper, $authorName, $file, $reviewerID, $reviewerComment
                $result = $viewMyPaperController1->viewMyPapers($_SESSION['UID']);
                if ($result) {
                    displayTable($result);
                } else displayError("Error: No papers found!");
                ?>
            </table>
        </div>
        <br><br>
        <!-- Return back to dashboard-->
        <div class="col-auto">
            <form action="authorDashboard.php" method="POST">
                <input class="form-control" type="submit" value="Return to Dashboard">
            </form>
        </div>
</body>

</html>