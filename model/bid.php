<?php
class Bid
{
	private $server = "localhost";
	private $username = "root";
	private $sqlPassword = "";
	private $db = "DB_bid";


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
	public function createBid($pid, $uid)//used to create a bid, enter PID and UID. Bid ID(BID) is auto generated upon insert
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "insert into tbl_bids (PID, UID) VALUES ('$pid', '$uid')";
		if (!$conn->query($sql)) {
			return false;
		} else return true;
	}
	public function deleteBid($bid)//used to delete a bid
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "delete from tbl_bids where BID = '$bid'";
		$result = $conn->query($sql);
		return $result;
	}
	public function viewBids(){//retrieves all bids in an assoc array
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_bids";
		$result = $conn->query($sql);
		return $result;
	}
	public function viewMyBids($uid){//retrieves all bids associated with a specific reviewerID(UID)
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_bids where UID = '$uid'";
		$result = $conn->query($sql);
		return $result;
	}
	public function viewReadyAssign(){//view all bids with reviewer workload info
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select b.BID, b.PID, b.UID, u.assigned, u.workload from tbl_bids as b join DB_user.tbl_users as u on b.UID = u.UID;";
		$result = $conn->query($sql);
		return $result;
	}
	public function removeBiddedPaper($pid, $uid)//remove a specific bid matching PID and UID (used when assigning a paper to a reviewer based on their bid)
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "delete from tbl_bids where PID = '$pid' AND UID ='$uid'";
		$result = $conn->query($sql);
		return $result;
	}
}
