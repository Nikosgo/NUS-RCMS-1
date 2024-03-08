<?php
class UserProfile
{
	private $server = "localhost";
	private $username = "root";
	private $sqlPassword = "";
	private $db = "DB_profile";


	function __construct($profileName = NULL)
	{
	}

	public function connectUserProfileDB()
	{ //used to connect to DB
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		if ($conn->connect_error) {
			die("connection failed...");
			return false;
		} else return true;
	}
	public function createUserProfile($profileName)//used to create a userProfile, userProfileID(UPID) is auto increment
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "insert into tbl_profiles (userProfile) VALUES ('$profileName')";
		if (!$conn->query($sql)) {
			return false;
		} else return true;
	}
	public function viewUserProfile()//retrieves all userProfiles
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_profiles";
		$result = $conn->query($sql);
		return $result;
	}
	public function viewUserProfileByID($upid)//retrieves all userProfiles
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "select * from tbl_profiles where UPID = '$upid'";
		$result = $conn->query($sql);
		return $result;
	}
	public function editUserProfile($profileName, $upid)//used to edit a specific userProfile, by UPID
	{
		$conn = new mysqli($this->server, $this->username, $this->sqlPassword, $this->db);
		$sql = "update tbl_profiles
		set userProfile = '$profileName'
		where UPID = '$upid'";
		if (!$conn->query($sql)) {
			return false;
		} else {
			return true;
		}
	}
}
