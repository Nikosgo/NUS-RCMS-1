<?php
require("../entity/comment.php");
?>

<?php
class CreateCommentController
{
    function __construct()
    {
    }
    function createComment($content, $userID, $reviewID)
    {
        if ($content == '') return false;
        $comment = new Comment();
        $comment->connectDB();
        if ($comment->createComment($content, $userID, $reviewID)) {//create review and update in DB_review
			return true;
		} else return false;
    }
}
?>
