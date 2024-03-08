<?php
class User
{
	private $server = "localhost";
	private $username = "root";
	private $sqlPassword = "";
	private $db = "DB_user";

	function __construct()
	{
	}

	public function connectUserDB()
	{ //used to connect to DB
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		if ($conn->connect_error) {
			die("connection failed...");
		} else return 1;
	}
	public function validateUser($email, $password)//used for validating login credentials
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_users where email like '$email'
								and password like '$password'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) return true;
		else return false;
	}
	public function retrieveUser($email, $password)//used to retrieve a specific user, by their login credentials
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_users where email like '$email'
								and password like '$password'";
		$result = $conn->query($sql);
		return $result;
	}
	public function createUser($name, $email, $password, $profileName)//used to create a new user, userID(UID) is auto increment
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "insert into tbl_users (name, email, password, userProfile) values ('$name', '$email', '$password', '$profileName')";
		if (!$conn->query($sql)) {
			return false;
		} else return true;
	}
	public function viewUser()//retrieves all users
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_users";
		$result = $conn->query($sql);
		return $result;
	}
	public function searchUser($query)//wildcard search by name, userProfile or email
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_users where name like '%$query%' or userProfile like '%$query%' or email like '%$query%'";
		$result = $conn->query($sql);
		return $result;
	}
	public function searchUID($query)//retrieve a specific user by UID
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_users where UID like '$query'";
		$result = $conn->query($sql);
		return $result;
	}
	public function deleteUser($query)//delete a specific user by UID
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "delete from tbl_users where UID = '$query'";
		$conn->query($sql);
		if($conn->affected_rows > 0) return true;
		else return false;
	}
	public function editUser($name, $email, $password, $profileName, $uid)//edit a specific user by UID
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "update tbl_users
		set name = '$name',
		email = '$email',
		password = '$password',
		userProfile = '$profileName'
		where UID = '$uid'";
		if (!$conn->query($sql)) {
			return false;
		} else return true;
	}
	public function editWorkload($workload, $uid)//edit the max workload of a user (used for reviewer workload)
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "update tbl_users
		set workload = '$workload'
		where UID = '$uid'";
		if (!$conn->query($sql)) {
			return false;
		} else return true;
	}
	public function editAssigned($assigned, $uid)//edit the # of assigned papers of a user (used for reviewer workload)
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "update tbl_users
		set assigned = '$assigned'
		where UID = '$uid'";
		if (!$conn->query($sql)) {
			return false;
		} else return true;
	}

	public function viewAvailReviewers() {//retrieves all users of the 'Reviewer' userProfile
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_users where userProfile = 'Reviewer'";
		$result = $conn->query($sql);
		return $result;
	}

	public function getReviewerList() {//retrieves all users of the 'Reviewer' userProfile
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select UID from tbl_users where userProfile = 'Reviewer'";
		$result = $conn->query($sql);
		return $result;
	}
}