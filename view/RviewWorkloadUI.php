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
    require("../control/RviewWorkloadController.php");
    if (!function_exists("displayError")) {
        function displayError($msg)
        { //displays error message
            echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/reviewerDashboard.php';</script>";
        }
    }

    function displayWorkload($result)
    { //function to display current user(reviewer's) # of Assigned papers / Max workload
        $row = $result->fetch_assoc();
        $workload = $row['workload'];
        $assigned = $row['assigned'];
    ?>
        <h3>My Workload</h3>
        <table>
            <tr>
                <th>Assigned</th>
                <th>Workload</th>
            </tr>
            <tr>
                <td><?php echo $assigned; ?></td>
                <td><?php echo $workload; ?></td>
            </tr>
        </table>
    <?php
    }
    ?>
</head>

<body>
    <div>
        <?php
        $viewWorkloadController1 = new ViewWorkloadController();
        $result = $viewWorkloadController1->viewWorkload($uid);
        if ($result) {
            displayWorkload($result);
        }else displayError("Error! Unable to display Workload!");

        ?>
    </div>
</body>

</html>