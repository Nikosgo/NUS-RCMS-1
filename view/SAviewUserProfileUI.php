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
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/systemAdminDashboard.php';</script>";
    }
    function displayUserProfiles($result)
    {

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>";
            echo $row['UPID'];
            echo "</td>";
            echo "<td>";
            echo $row['userProfile'];
            echo "</td>";
            echo "<td>"; ?>
            <form action="SAeditUserProfileUI.php" method="POST">
                <input type="hidden" id="userProfile" name="userProfile" value="<?php echo $row['userProfile']; ?>">
                <input type="hidden" id="UPID" name="UPID" value="<?php echo $row['UPID']; ?>">
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
    <div>
        <table>
            <tr>
                <th>UPID</th>
                <th>User Profile</th>
                <th></th><!-- edit -->
            </tr>
            <?php
            require("../control/SAviewUserProfileController.php");
            $viewUserProfileController = new SAviewUserProfileController();
            $result = $viewUserProfileController->viewUserProfile();
            if ($result) displayUserProfiles($result);
            else displayError("Error: No User Profiles to display!");
            ?>
        </table>
    </div>
</body>

</html>