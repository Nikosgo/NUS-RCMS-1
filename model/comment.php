<?php
class Comment
{
	private $server = "localhost";
	private $username = "root";
	private $sqlPassword = "";
	private $db = "DB_comment";


	function __construct()
	{
	}
	public function connectDB()
	{ //used to connect to DB
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		if ($conn->connect_error) {
			die("connection failed...");
			return false;
		} else return true;
	}
	public function createComment($content, $userID, $reviewID)//used to create a new comment. commentID(CID) is auto generated upon insert.
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "insert into tbl_comments (content, reviewID, userID) VALUES ('$content', $reviewID, $userID)";
		if (!$conn->query($sql)) {
			return false;
		} else return true;
	}
	public function deleteComment($cid)//used to delete a specific comment, based on the CID
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "delete from tbl_comments where CID = '$cid'";
		if (!$conn->query($sql)) {
			return false;
		} else return true;
	}
	public function viewComments($reviewID)//display all comments associated with this reviewID
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_comments where reviewID = '$reviewID'";
		$result = $conn->query($sql);
		return $result;
	}
	public function editComment($cid, $content)//for updating comment content. specific comment using CID
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "update tbl_comments
		set
		content = '$content'
		where CID = '$cid'";
		if (!$conn->query($sql)) {
			return false;
		} else return true;
	}

	public function viewComment($cid)//for viewing a specific comment, by CID
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_comments where CID = '$cid'";
		$result = $conn->query($sql);
		return $result;
	}
}