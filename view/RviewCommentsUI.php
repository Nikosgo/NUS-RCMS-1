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
    require_once("../control/RviewCommentsController.php");
    if (!function_exists("noComments")) {
        function noComments($msg)
        { //displays error message
            echo "$msg";
        }
    }

    //displayError() already called
    //session already started
    if (!function_exists("displayComments")) {
        function displayComments($result1)
        {
            while ($row1 = $result1->fetch_assoc()) {
                $userID = $row1['userID'];
                $uid = $_SESSION['UID'];
                $cid = $row1['CID'];
                echo "<tr>";
                echo "<td>";
                echo $row1['CID'];
                echo "</td>";
                echo "<td>";
                echo $row1['content'];
                echo "</td>";
    ?>
                <td>
                    <form action="ReditCommentUI.php" method="POST">
                        <input type="hidden" id="CID" name="CID" value="<?php echo $cid ?>">
                        <input class="form-control" type="submit" value="Edit" <?php if ($userID != $uid) echo 'disabled'; ?>>
                    </form>
                </td>
                <td>
                    <form action="RdeleteCommentUI.php" method="POST">
                        <input type="hidden" id="CID" name="CID" value="<?php echo $cid ?>">
                        <input class="form-control" type="submit" value="Delete" <?php if ($userID != $uid) echo 'disabled'; ?>>
                    </form>
                </td>
                <?php
                ?>
    <?php

            }
        }
    }
    ?>
</head>

<body>
    <div>
    </div>
    <div>
        <?php
        $uid = $_SESSION['UID'];
        $viewCommentsController1 = new viewCommentsController();
        $result1 = $viewCommentsController1->viewComments($reviewID);
        if (!empty($result1)) { ?>
            <table>
                <tr>
                    <th>Comment ID</th>
                    <th>Content</th>
                    <th></th><!-- Edit Button -->
                    <th></th><!-- Delete Button -->
                </tr>
                <?php

                if ($result1) {
                    displayComments($result1);
                }
                ?>
            </table>
        <?php } else noComments("No comments yet!"); ?>
    </div>
</body>
<!--viewing this paper's reviews -->

</html>