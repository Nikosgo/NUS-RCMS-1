<!-- DEBUG: Creates DB and table to store information about userProfiles -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DB_profile";
$dbtable = "tbl_profiles";
//create DB
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
	die("connection failed...");
}

$sql = "create database if not exists $dbname";
if ($conn->query($sql) == TRUE) {
	echo "database exists or created ...", "<br>";
} else {
	echo "error creating database...", "<br>";
}

$conn->close();
//create Table
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("connection failed...");
}

$checktable = $conn->query("show tables like '$dbtable'");
$table_exists = $checktable->num_rows >= 1;

if (!$table_exists) {
	$sql = "create table $dbtable (
		UPID int(6) unsigned auto_increment primary key,
		userProfile varchar(30) not null
		)";

	if ($conn->query($sql) == TRUE) {
		echo "table created....", "<br>";
	} else {
		echo "error creating table...", "<br>";
	}
} else {
	echo "table exist.\n";
}

$conn->close();
//populate table
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("connection failed...");
}
$sql = "insert into tbl_profiles (userProfile) VALUES ('SystemAdmin'),
														('ConferenceChair'),
														('Reviewer'),
														('Author')";
$conn->query($sql);
$conn->close();

header("Location: http://localhost/314/ui");

?>