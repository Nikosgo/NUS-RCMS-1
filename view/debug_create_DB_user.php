<!-- DEBUG: Creates DB and table to store information about userAccounts -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DB_user";
$dbtable = "tbl_users";

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

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("connection failed...");
}

$checktable = $conn->query("show tables like '$dbtable'");
$table_exists = $checktable->num_rows >= 1;

if (!$table_exists) {
	$sql = "create table $dbtable (
		UID int(6) unsigned auto_increment primary key,
		name varchar(30) not null,
		email varchar(30) not null,
		password varchar(300) not null,
		userProfile varchar(30) not null,
		assigned int(6) default 0,
		workload int(6) default 5
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
$sql = "insert into $dbtable (name, email, password, userProfile) VALUES ('admin', 'admin@mail.com', 'password', 'SystemAdmin'),
																		('Henry Albert', 'ha@mail.com', 'password', 'ConferenceChair')";
$conn->query($sql);
$sql = "insert into $dbtable (name, email, password, userProfile, assigned) VALUES 
																		('Ken Tan', 'kt@mail.com', 'password', 'Reviewer', 1),
																		('Mike Pong', 'mp@mail.com', 'password', 'Reviewer', 1)
																		";
$conn->query($sql);
$sql = "insert into $dbtable (name, email, password, userProfile) VALUES 
																		('Jill Kii', 'jk@mail.com', 'password', 'Author'),
																		('Bill Ang', 'ba@mail.com', 'password', 'Author')";
$conn->query($sql);
$conn->close();

header('Location: http://localhost/314/ui');

?>