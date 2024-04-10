<?php
require("../entity/comment.php");
?>

<?php
class RdeleteCommentController
{
    function __construct()
    {
    }

    function RdeleteComment($cid)
    {
        $comment1 = new Comment();
        $comment1->connectDB();
        if($comment1->deleteComment($cid))
        {
            return true;
        }
        else return false;
    }
}
?>
