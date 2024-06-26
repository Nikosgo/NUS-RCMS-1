<?php session_start() ?>
<html>
<head>
    <link href="style.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    
    <?php
    $uid = $_SESSION['UID'];
    require("../controller/RviewMyBidsController.php");
    function displayError($msg)
    { //displays error message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost:8080/view/reviewerDashboard.php';</script>";
    }
    function displayBiddedPapers($result)
    {
        while ($row = $result->fetch_assoc()) {
            $pid = $row['PID'];
            $bid = $row['BID'];
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
            echo "<td>"; ?>
            <form action="RviewBidPaperUI.php" method="POST">
                <input type="hidden" id="PID" name="PID" value="<?php echo $pid; ?>">
                <div id="form">
                    <button>View Paper</button>
                </div>
                <!-- <input class="form-control" type="submit" value="View Paper"> -->
            </form>
            <?php
            echo "</td>";
            echo "<td>"; ?>
            <form action="RdeleteBidUI.php" method="POST">
                <input type="hidden" id="PID" name="PID" value="<?php echo $pid; ?>">
                <input type="hidden" id="BID" name="BID" value="<?php echo $bid; ?>">
                <div id="forml">
                    <button>Delete Bid</button>
                </div>
                <!-- <input class="form-control" type="submit" value="Delete Bid"> -->
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
    </div>
    <div>
        <!-- displayBiddedPapers() -->
        <h3>My Bids</h3>
        <table>
            <tr>
                <th>Bid ID</th>
                <th>Paper ID</th>
                <th>User ID</th>
            </tr>
            <?php

            $viewMyBidsController1 = new  viewMyBidsController();
            $result = $viewMyBidsController1->viewMyBids($uid);
            if ($result) {
                displayBiddedPapers($result);
            } else displayError("Error: No papers found!");
            ?>
        </table>
        <div class="col-auto">
            <form action="reviewerDashboard.php" method="POST">
                <input class="form-control" type="submit" value="Return to Dashboard">
            </form>
        </div>
    </div>
</body>

</html>