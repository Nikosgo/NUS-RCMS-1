<html>

<head>
    <link href="style.css" rel="stylesheet">
    
    <?php
    function displayError($msg)
    { //displays error message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost:8080/view/systemAdminDashboard.php';</script>";
    }
    function displayUsers($result)
    {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $uid = $row['UID'];
                echo "<tr>";
                echo "<td>";
                echo $row['UID'];
                echo "</td>";
                echo "<td>";
                echo $row['name'];
                echo "</td>";
                echo "<td>";
                echo $row['email'];
                echo "</td>";
                echo "<td>";
                echo $row['password'];
                echo "</td>";
                echo "<td>";
                echo $row['userProfile'];
                echo "</td>";
                echo "<td>"; ?>
                <form action="SAeditUserUI.php" method="POST">
                    <input type="hidden" id="UID" name="UID" value="<?php echo $uid; ?>">
                    <div id="form">
                        <button>Edit</button>
                    </div>
                </form>
                <?php
                echo "</td>";
                echo "<td>"; ?>
                <form action="SAdeleteUserUI.php" method="POST">
                    <input type="hidden" id="UID" name="UID" value="<?php echo $uid; ?>">
                    <div id="forml">
                        <button>Delete</button>
                    </div>
                </form>
    <?php
                echo "</td>";
                echo "</tr>";
            }
        } else echo "Error!";
    }
    ?>
</head>

<body>
    <div>
        <table>
            <tr>
                <th>UID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>User Profile</th>
            </tr>
            <?php
            require("../controller/SAviewUserController.php");
            $viewUserController1 = new SAviewUserController();
            if(!$result = $viewUserController1->viewUser()){
                displayError("Failed to display users!");
            }
            else displayUsers($result);
            ?>
        </table>
    </div>
</body>

</html>