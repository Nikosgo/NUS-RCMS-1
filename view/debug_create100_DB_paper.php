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
for($i=0; $i<76; $i++){
	$x = $i+26;
	$title = "paper$x";
	$content = "paper$x content";
	$sql = "insert into tbl_papers (title, content, authorID, status, authorName) VALUES
	('$title', '$content', '77', 'pending', 'author21')";
$conn->query($sql);
}
$conn->close();

header("Location: http://localhost/314/ui");

?>