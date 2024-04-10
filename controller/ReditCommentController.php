<?php
require("../entity/comment.php");
?>

<?php
class ReditCommentController
{
    function __construct()
    {
        
    }

    function viewComment($cid)
    {
        $comment1 = new Comment();
        $comment1->connectDB();
        $result = $comment1->viewComment($cid);
        if($result->num_rows > 0)
        {
            return $result;
        }
        else return false;

    }

    function ReditComment($cid,$content)
    {
        if($content == "") return false;
        $comment1 = new Comment();
        $comment1->connectDB();
        if($comment1->editComment($cid, $content))
        {
            return true;
        }
        else return false;
        
    }
}

?>