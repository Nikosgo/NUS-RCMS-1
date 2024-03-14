<!-- DEBUG: Creates DB and table to store information about userProfiles -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DB_paper";
$dbtable = "tbl_papers";
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
		PID int(6) unsigned auto_increment primary key,
		title varchar(30) not null,
		content varchar(30) not null,
		authorID varchar(30) not null,
		status varchar(30) not null,
		reviewerID int(6),
		authorName varchar(30),
		coAuthorName varchar(30)
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
$sql = "insert into tbl_papers (title, content, authorID, status, authorName) 
		VALUES ('paperA', 'paperA content', '5', 'pending', 'Jill Kii')
		, ('paperB', 'paperB content', '6', 'pending', 'Bill Ang')
		, ('paper1', 'paper1 content', '5', 'pending', 'Jill Kii')
		, ('paper2', 'paper2 content', '6', 'pending', 'Bill Ang')";
$conn->query($sql);
$sql = "insert into tbl_papers (title, content, authorID, status, reviewerID, authorName) 
		VALUES ('paperC', 'paperC content', '5', 'assigned', 3, 'Jill Kii')
		, ('paperD', 'paperD content', '6', 'reviewed', NULL, 'Bill Ang')
		, ('paperE', 'paperE content', '5', 'accepted', NULL, 'Jill Kii')
		, ('paperF', 'paperF content', '6', 'rejected', NULL, 'Bill Ang')
		, ('paperG', 'paperG content', '5', 'assigned', 4, 'Jill Kii')";
$conn->query($sql);
$conn->close();

header("Location: http://localhost/314/ui");

?>