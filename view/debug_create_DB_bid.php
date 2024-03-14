<!-- DEBUG: Creates DB and table to store information about bids -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DB_bid";
$dbtable = "tbl_bids";
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
		BID int(6) unsigned auto_increment primary key,
		PID int(6) not null,
		UID int(6) not null
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
$sql = "insert into tbl_bids (PID, UID) VALUES (1, 3)";
$conn->query($sql);
$conn->close();

header("Location: http://localhost/314/ui");

?>