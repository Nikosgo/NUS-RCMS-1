<?php
class CCviewAvailableReviewerController
{
    public function viewAvailReviewers()
    {
        $user1 = new User();
        $user1->connectUserDB();
        $result = $user1->viewAvailReviewers();
        if ($result->num_rows > 0) {
            return $result;
        } else return false;
    }
}
