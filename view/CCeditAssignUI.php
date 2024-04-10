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
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/CCviewAssignedUI.php';</script>";
    }

    function displaySuccess($msg) {
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/CCviewAssignedUI.php';</script>";
    }

    function displayForm($result) {
        ?>
        <table>
            <tr>
                <th>Paper ID</th>
                <th>Title</th>
                <th>Author ID</th>
                <th>Status</th>
                <th> Current Reviewer </th>
                <th> Assign To Reviewer </th>
                <th></th>
            </tr>
            <?php
            $editAssignedController1 = new CCeditAssignController();
            $pid = $_POST['pid'];
            $uid = $_POST['reviewerID'];
            $result = $editAssignedController1->viewIndivAssigned($pid, $uid);
            $result2 = $editAssignedController1->getReviewerList();
            if ($result->num_rows > 0) {
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
                    <!-- takes the input of paperID, reviewerID, changed reviewerID -->
                    <form action="../ui/CCeditAssignUI.php" method="POST" class="row">
                        <div class="col-auto">
                            <input type="hidden" id="flag" name="flag" value=1>
                            <input type="hidden" id="PID" name="PID" value="<?php echo $pid ?>">
                            <input type="hidden" id="RID" name="RID" value="<?php echo $reviewerID ?>">
                            <select name="currReviewer" id="currReviewer">
                            <?php
                                while ($row = $result2->fetch_assoc()) {
                                    $RID = $row['UID'];
                                    echo "<option value='$RID'>$RID</option>";
                                }
                                
                                ?>
                            </select>
                            <?php
                    echo "</td>";
                    echo "<td>"; ?>
                    <!-- WIP this might not be implemented -->
                            <input class="form-control" type="submit" value="Confirm">
                    </form>
                    
            <?php
                    echo "</td>";
                    echo "</tr>";
                }    
            }
            ?>
        </table>
    <?php
    }
    ?>
</head>

<body>
    <h2> Edit Assigned Paper </h2>
    <?php
    require("../control/CCeditAssignController.php");
    session_start();
    if (isset($_POST['flag'])) {
        if ($_POST['flag'] == 1) {
            $newReviewer = $_POST['currReviewer'];
            $paperID = $_POST['PID'];
            $oldReviewer = $_POST['RID'];
            $editAssignController1 = new CCeditAssignController();
            if (!$editAssignController1->changeAssigned($paperID, $oldReviewer, $newReviewer)) {
                displayError("Error changing assigned reviewer!");
            }
            else {
                displaySuccess("Assigned reviewer changed successfully!");
            }
        }
    } else {
        $rid = $_POST['reviewerID'];
        $paperID = $_POST['pid'];
        $editAssignController2 = new CCeditAssignController();
        $result = $editAssignController2->viewIndivAssigned($paperID, $rid);
        if(!$result) {
            displayError("Error viewing assigned reviewer!");
        } else {
            displayForm($result);
        }
    }
    ?>
    <br><br>
</body>

</html>
