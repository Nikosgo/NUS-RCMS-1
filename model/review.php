<?php
class Review
{
	private $server = "localhost";
	private $username = "root";
	private $sqlPassword = "";
	private $db = "DB_review";


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
	public function createReview($content, $rating, $reviewerID, $pid)//used when creating a new review entry. reviewID(RID) is auto increment
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "insert into tbl_reviews (content, rating, PID, reviewerID, score) VALUES ('$content', $rating, $pid, $reviewerID, 0)";
		if (!$conn->query($sql)) {
			return false;
		} else return true;
	}
	public function deleteReview($rid)//used to delete a specific review, by RID
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "delete from tbl_reviews where RID = '$rid'";
		if (!$conn->query($sql)) {
			return false;
		} else return true;
	}
	public function viewReviews()//retrieves all reviews
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_reviews";
		$result = $conn->query($sql);
		return $result;
	}
	public function viewMyReviews($uid)//retrieves all reviews made by a specific reviewer by reviewerID
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_reviews where reviewerID = '$uid'";
		$result = $conn->query($sql);
		return $result;
	}
	public function viewPaperReviews($pid){//retrieves all reviews associated with a specific paper, by paperID(PID)
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_reviews where PID = '$pid'";
		if (!$result = $conn->query($sql)) {
			return false;
		} else return $result;
	}
	public function viewReview($rid)//view a specific review, by RID
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_reviews where RID = '$rid'";
		$result = $conn->query($sql);
		return $result;
	}
	public function editReview($content, $rating, $rid)//update the content and rating of a specific review, by RID
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "update tbl_reviews
		set rating = $rating,
		content = '$content'
		where RID = '$rid'";
		if (!$conn->query($sql)) {
			return false;
		} else return true;
	}
	public function searchReview($query)//wildcard search by PID, RID or content
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_reviews where PID like '$query'
											or RID like '$query'
											or content like '%$query%'";
		$result = $conn->query($sql);
		return $result;
	}
	public function searchReviewByPID($pid)//search by PID
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_reviews where PID like '$pid'";
		$result = $conn->query($sql);
		return $result;
	}
	public function scoreReview($score, $rid){//for author to score a specific review after a paper has been accepted/rejected
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "update tbl_reviews
		set score = score + $score
		where RID = '$rid'";
		if (!$conn->query($sql)) {
			return false;
		} else return true;
	}
}