<?php
require("../entity/comment.php");

class ViewCommentsController
{
    public function viewComments($reviewID)
    {
        $comment = new Comment();
        $comment->connectDB();
        $result = $comment->viewComments($reviewID);
        if ($result->num_rows > 0) {
            return $result;
        } else return false;
    }
}

//viewComments
