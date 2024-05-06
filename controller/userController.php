<?php

// Define base user class
class User {
    protected $UID;
    protected $name;
    protected $email;
    protected $password;

}

// Extend the User class for different user types
class Author extends User {

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
}

class ConferenceChair extends User {
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
}

class Reviewer extends User {
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
}

class SystemAdmin extends User {
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

// The Application class with methods to create different types of users
class Application {
    public function createAuthor($UID, $name, $email, $password) {
        return new Author($UID, $name, $email, $password);
    }

    public function createConferenceChair($UID, $name, $email, $password) {
        return new ConferenceChair($UID, $name, $email, $password);
    }

    public function createReviewer($UID, $name, $email, $password) {
        return new Reviewer($UID, $name, $email, $password);
    }

    public function createSystemAdmin($UID, $name, $email, $password) {
        return new SystemAdmin($UID, $name, $email, $password);
    }
}

// Example usage
$app = new Application();

$author = $app->createAuthor($authorUID, $authorName, $authorEmail, $authorPassword);
$conferenceChair = $app->createConferenceChair($chairUID, $chairName, $chairEmail, $chairPassword);
$reviewer = $app->createReviewer($reviewerUID, $reviewerName, $reviewerEmail, $reviewerPassword);
$systemAdmin = $app->createSystemAdmin($adminUID, $adminName, $adminEmail, $adminPassword);

?>
