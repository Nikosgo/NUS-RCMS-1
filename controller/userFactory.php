<?php

interface UserFactory {
    public function createUser();
}

class SystemAdminFactory implements UserFactory {
    public function createUser() {
        return new SystemAdmin();
    }
}

class AuthorFactory implements UserFactory {
    public function createUser() {
        return new Author();
    }
}

class ReviewerFactory implements UserFactory {
    public function createUser() {
        return new Reviewer();
    }
}

class ConferenceChairFactory implements UserFactory {
    public function createUser() {
        return new ConferenceChair();
    }
}

class SystemAdmin {
    private $userProfile;

    public function __construct() {
        $this->userProfile = 'SystemAdmin';
    }

    
    function createUser($name, $email, $password, $profileName)
	{
		if($name == "") return false;
		if($email == "") return false;
		if($password == "") return false;
		$user1 = new User($name, $email, $password, $profileName);
		$user1->connectUserDB();
		if ($user1->createUser($name, $email, $password, $profileName)) {
			return true;
		} else return false;
	}
    
}

class Author {
    private $userProfile;

    public function __construct() {
        $this->userProfile = 'Author';
    }

    function paperSubmission($title, $content, $authorID, $coAuthor)
    {
        if ($title == '' || $content == '') return false;
        $authorName = $this->getAuthorName($authorID);
        $paper = new Paper();
        $paper->connectPaperDB();
        if ($paper->createPaper($title, $content, $authorID, $authorName, $coAuthor)) {
            return true;
        } else return false;
    }
    function getAuthorName($authorID){
        $user = new User();
        $user->connectUserDB();
        $result = $user->searchUID($authorID);
        $row = $result->fetch_assoc();
        $authorName = $row['name'];
        return $authorName;
    }

    function createUser($name, $email, $password, $profileName)
	{
		if($name == "") return false;
		if($email == "") return false;
		if($password == "") return false;
		$user1 = new User($name, $email, $password, $profileName);
		$user1->connectUserDB();
		if ($user1->createUser($name, $email, $password, $profileName)) {
			return true;
		} else return false;
	}

}

class Reviewer {
    private $userProfile;

    public function __construct() {
        $this->userProfile = 'Reviewer';
    }

    function createUser($name, $email, $password, $profileName)
	{
		if($name == "") return false;
		if($email == "") return false;
		if($password == "") return false;
		$user1 = new User($name, $email, $password, $profileName);
		$user1->connectUserDB();
		if ($user1->createUser($name, $email, $password, $profileName)) {
			return true;
		} else return false;
	}
   
    function RcreateComment($content, $userID, $reviewID)
    {
        if ($content == '') return false;
        $comment = new Comment();
        $comment->connectDB();
        if ($comment->createComment($content, $userID, $reviewID)) {
			return true;
		} else return false;
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


class ConferenceChair {
    private $userProfile;

    public function __construct() {
        $this->userProfile = 'ConferenceChair';
    }

    function createUser($name, $email, $password, $profileName)
	{
		if($name == "") return false;
		if($email == "") return false;
		if($password == "") return false;
		$user1 = new User($name, $email, $password, $profileName);
		$user1->connectUserDB();
		if ($user1->createUser($name, $email, $password, $profileName)) {
			return true;
		} else return false;
	}
    
    function acceptPaper($pid)
    {
		$paper1 = new Paper();
        $paper1->connectPaperDB();
		if($paper1->updatePaperStatus($pid, 'accepted'))
        {
			return true;
		}
		else return false;
	}

    function rejectPaper($pid, $uid)
    {
		$paper1 = new Paper();
        $paper1->connectPaperDB();
		if($paper1->updatePaperStatus($pid, 'rejected'))
        {
			return true;
		}
		else return false;
	}

    function deleteAssignment($pid, $reviewerID) {
        $paper1 = new Paper();
        $paper1->connectPaperDB();
        if ($paper1->deleteAssign($pid)) {
            return $this->updateReviewerAssigned($reviewerID);
        }
        else {
            return false;
        }
    }

    function changeBidStatus($pid, $uid) {
        $bid1 = new Bid();
        $bid1->connectDB();
        if ($bid1->removeBiddedPaper($pid, $uid)) {
            if ($this->assignReviewer($pid, $uid)) {
                if ($this->updateReviewerAssigned($uid)){
                    return true;
                }
            }
            else {
                return false;
            }
        }
    }
    function assignReviewer($pid, $uid) {
        $paper1 = new Paper();
        $paper1->connectPaperDB();
        if ($paper1->assignPaperStatus($pid, $uid, 'assigned')) {
            return true;
        }
        else {
            return false;
        }
    }
    function updateReviewerAssigned($reviewerID){
        //get the current assigned #
        $result = $this->searchUID($reviewerID);
        $row = $result->fetch_assoc();
        $assigned = $row['assigned'];
        //increment by one after getting assigned to work
        $assigned +=1;
        //update new number back to DB
        $user1 = new User();
		$user1->connectUserDB();
        if($user1->editAssigned($assigned, $reviewerID)) {
            return true;
        } else {
            return false;
        }
    }
    function searchUID($reviewerID){
        $user1 = new User();
		$user1->connectUserDB();
		$result = $user1->searchUID($reviewerID);
		return $result;
    }
}

/*
$systemAdminFactory = new SystemAdminFactory();
$systemAdmin = $systemAdminFactory->createUser();

$authorFactory = new AuthorFactory();
$author = $authorFactory->createUser();

$reviewerFactory = new ReviewerFactory();
$reviewer = $reviewerFactory->createUser();

$conferenceChairFactory = new ConferenceChairFactory();
$conferenceChair = $conferenceChairFactory->createUser(); */

