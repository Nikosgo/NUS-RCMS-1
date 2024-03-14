<!-- DEBUG: Creates DB and table to store information about reviews -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DB_review";
$dbtable = "tbl_reviews";
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
		RID int(6) unsigned auto_increment primary key,
		content varchar(300) not null,
		rating int(6) not null,
		PID int(6) not null,
		reviewerID int(6) not null,
		score int(6) not null
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
$sql = "insert into tbl_reviews (content, rating, PID, reviewerID, score) VALUES ('review content a', 3, 6, 3, 0)
,('review content b', 2, 7, 4, 0)
,('review content c', -2, 8, 3, 0)";
$conn->query($sql);
$conn->close();

header("Location: http://localhost/314/ui");

?>