<!-- DEBUG: Creates DB and table to store information about reviews -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DB_comment";
$dbtable = "tbl_comments";
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
		CID int(6) unsigned auto_increment primary key,
		content varchar(300) not null,
		reviewID int(6) not null,
		userID int(6) not null
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
$sql = "insert into tbl_comments (content, reviewID, userID) VALUES ('comment content a', 1, 4)
,('comment content b', 2, 3)
,('comment content c', 3, 4)";
$conn->query($sql);
$conn->close();

header("Location: http://localhost/314/ui");

?>