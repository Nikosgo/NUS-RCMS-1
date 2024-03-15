<?php
class Paper
{
	private $server = "localhost";
	private $username = "root";
	private $sqlPassword = "";
	private $db = "DB_paper";

	function __construct()
	{
	}

	public function connectPaperDB()
	{ //used to connect to DB
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		if ($conn->connect_error) {
			die("connection failed...");
		} else return 1;
	}
	public function checkPaperStatus($query)//returns the status of a specific paper, by PID
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select status from tbl_papers where PID = '$query'";
		$result = $conn->query($sql);
		return $result;
	}


	public function viewPapers()//returns assoc array of all papers
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_papers";
		$result = $conn->query($sql);
		return $result;
	}

	public function viewPaper($query)//for viewing a specific paper, by PID
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_papers where PID like '$query'";
		$result = $conn->query($sql);
		return $result;
	}

	public function viewMyPapers($uid)//for viewing all papers created by a specific authorID
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_papers where authorID = '$uid'";
		$result = $conn->query($sql);
		return $result;
	}

	public function createPaper($title, $content, $authorID, $authorName, $coAuthor)//to create a new paper, default paper status is 'pending'
	{
		//needs to implement logic for tagging author & review status verification(done)
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "insert into tbl_papers (title, content, authorID, status, authorName, coAuthorName) values ('$title', '$content', '$authorID', 'pending', '$authorName', '$coAuthor')";
		if (!$conn->query($sql)) {
			return false;
		} else return true;
	}

	public function deletePaper($query)//to delete a specific paper, by PID
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "delete from tbl_papers where PID = '$query'";
		$result = $conn->query($sql);
		return $result;
	}

	public function editPaper($title, $content, $pid, $coAuthor) //edit the title or content of a paper
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "update tbl_papers
		set title = '$title',
		content = '$content',
		coAuthorName = '$coAuthor'
		where pid = '$pid'";
		if (!$conn->query($sql)) {
			return false;
		} else return true;
	}

	public function searchPID($query)//find a specific paper by PID
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_papers where PID like '$query'";
		$result = $conn->query($sql);
		return $result;
	}

	//this is new used for search
	public function searchPaper($query)//multi col wildcard search, allowing for partial matches
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_papers where title like '%$query%' or content like '%$query%' or authorID like '%$query%' or status like '%$query%'";
    $result = $conn->query($sql);
		return $result;
	}
	public function reviewerDashboardPapers()//displays papers with status != bidded and assigned (pending, reviewed, accepted, rejected)
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_papers where status not like 'bidded' and status not like 'assigned'";
		$result = $conn->query($sql);
		return $result;
	}

	public function updatePaperStatus($pid, $status)//used to update the status of a paper when a paper gets reviewed or unassigned from a reviewer
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "update tbl_papers
		set status = '$status',
		reviewerID = NULL
		where pid = '$pid'";
		if (!$conn->query($sql)) {
			return false;
		} else return true;
	}

	public function viewMyAssignedPapers($uid)//for retrieving papers assigned to a specific reviewerID
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_papers where reviewerID like '$uid' and status like 'assigned'";
		$result = $conn->query($sql);
		return $result;
	}

	public function assignPaperStatus($pid, $uid, $status)//used when a reviewer is assigned to a paper, changing status and setting reviewerID
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "update tbl_papers
		set status = '$status',
		reviewerID = '$uid'
		where pid = '$pid'";
		if (!$conn->query($sql)) {
			return false;
		} else return true;
	}
	public function viewAssignedPapers()//unused
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_papers where status like 'assigned'";
		$result = $conn->query($sql);
		return $result;
	}
	public function deleteAssign($pid)//used when unassigning a reviewer from a paper
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "update tbl_papers
		set status = 'pending',
		reviewerID = NULL
		where pid = '$pid'";
		if (!$conn->query($sql)) {
			return false;
		} else return true;
	}
	public function viewIndivAssigned($pid, $uid)//viewing a specific paper by PID and reviewerID(uid)
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * 
		from tbl_papers 
		where PID = '$pid' and
		reviewerID = '$uid'";
		$result = $conn->query($sql);
		return $result;
	}

	public function changeAssigned ($paperID, $newReviewer) {//used when changing the assigned reviewer
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "update tbl_papers
		set reviewerID = '$newReviewer'
		where pid = '$paperID'";
		if (!$conn->query($sql)) {
			return false;
		} else return true;
	}

}