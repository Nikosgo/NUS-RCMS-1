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
</head>

<body>
    <?php
    //insert support/display functions here
    function displayError($msg)
    { //displays error message
        echo "<script type='text/javascript'>alert('$msg'); window.location='http://localhost/314/ui/reviewerDashboard.php';</script>";
    }
    function displayTable($result)
    { ?>
        <h2>Search Results</h2>
        <table>
            <tr>
                <th>PaperID</th>
                <th>Title</th>
                <th>AuthorID</th>
                <th>Status</th>
                <th></th><!-- view -->
            </tr>
            <?php

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

            ?>
        </table>
        <!-- Back button -->
        <div class="row">
            <div class="col-auto">
                <form action="reviewerDashboard.php" method="POST">
                    <input class="form-control" type="submit" value="Back">
                </form>
            </div>
        </div>
    <?php
    }

    if (isset($_POST['flag'])) {
        if ($_POST['flag'] == 1) {
            //retrieve $_POST vars
            $query = $_POST['query'];
            //require("");//require controller
            //instantiate controller
            //$Controller1 = new Controller();
            require("../control/RsearchPaperController.php");
            $RsearchPaperController1 = new RsearchPaperController();
            if ($result = $RsearchPaperController1->searchPaper($query)) {
                displayTable($result);
            } else displayError("Error: No papers found!");
            //if(function return false/error)
            //handle error
            //else
            //extract and display data
        }
    } else {
    ?>
        <!-- 
        form action to self
        set flag
        take in user input
    -->
        <!-- displaySearchForm -->
        <h2>Search Papers</h2>
        <form action="../ui/RsearchPaperUI.php" method="POST" class="row">
            <div class="col-auto">
                <input type="hidden" id="flag" name="flag" value=1>
                <label for="query" class="form-label">Search:</label><br>
                <input class="form-control" type="text" id="query" name="query" placeholder="query"><br>
                <input class="form-control" type="submit" value="Search">
            </div>

        </form>
        <!-- Back button -->
        <div class="row">
            <div class="col-auto">
                <form action="reviewerDashboard.php" method="POST">
                    <input class="form-control" type="submit" value="Back">
                </form>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>