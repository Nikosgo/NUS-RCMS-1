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
//add first 25 (System Admin)
$sql = "insert into $dbtable (name, email, password, userProfile) VALUES
('admin1', 'admin1@mail.com', 'password', 'SystemAdmin'),
('admin2', 'admin2@mail.com', 'password', 'SystemAdmin'),
('admin3', 'admin3@mail.com', 'password', 'SystemAdmin'),
('admin4', 'admin4@mail.com', 'password', 'SystemAdmin'),
('admin5', 'admin5@mail.com', 'password', 'SystemAdmin'),
('admin6', 'admin6@mail.com', 'password', 'SystemAdmin'),
('admin7', 'admin7@mail.com', 'password', 'SystemAdmin'),
('admin8', 'admin8@mail.com', 'password', 'SystemAdmin'),
('admin9', 'admin9@mail.com', 'password', 'SystemAdmin'),
('admin10', 'admin10@mail.com', 'password', 'SystemAdmin'),
('admin11', 'admin11@mail.com', 'password', 'SystemAdmin'),
('admin12', 'admin12@mail.com', 'password', 'SystemAdmin'),
('admin13', 'admin13@mail.com', 'password', 'SystemAdmin'),
('admin14', 'admin14@mail.com', 'password', 'SystemAdmin'),
('admin15', 'admin15@mail.com', 'password', 'SystemAdmin'),
('admin16', 'admin16@mail.com', 'password', 'SystemAdmin'),
('admin17', 'admin17@mail.com', 'password', 'SystemAdmin'),
('admin18', 'admin18@mail.com', 'password', 'SystemAdmin'),
('admin19', 'admin19@mail.com', 'password', 'SystemAdmin'),
('admin20', 'admin20@mail.com', 'password', 'SystemAdmin'),
('admin21', 'admin21@mail.com', 'password', 'SystemAdmin'),
('admin22', 'admin22@mail.com', 'password', 'SystemAdmin'),
('admin23', 'admin23@mail.com', 'password', 'SystemAdmin'),
('admin24', 'admin24@mail.com', 'password', 'SystemAdmin'),
('admin25', 'admin25@mail.com', 'password', 'SystemAdmin')";
$conn->query($sql);
//add Reviewers
$sql = "insert into $dbtable (name, email, password, userProfile) VALUES 
('reviewer1', 'reviewer1@mail.com', 'password', 'Reviewer'),
('reviewer2', 'reviewer2@mail.com', 'password', 'Reviewer'),
('reviewer3', 'reviewer3@mail.com', 'password', 'Reviewer'),
('reviewer4', 'reviewer4@mail.com', 'password', 'Reviewer'),
('reviewer5', 'reviewer5@mail.com', 'password', 'Reviewer'),
('reviewer6', 'reviewer6@mail.com', 'password', 'Reviewer'),
('reviewer7', 'reviewer7@mail.com', 'password', 'Reviewer'),
('reviewer8', 'reviewer8@mail.com', 'password', 'Reviewer'),
('reviewer9', 'reviewer9@mail.com', 'password', 'Reviewer'),
('reviewer10', 'reviewer10@mail.com', 'password', 'Reviewer'),
('reviewer11', 'reviewer11@mail.com', 'password', 'Reviewer'),
('reviewer12', 'reviewer12@mail.com', 'password', 'Reviewer'),
('reviewer13', 'reviewer13@mail.com', 'password', 'Reviewer'),
('reviewer14', 'reviewer14@mail.com', 'password', 'Reviewer'),
('reviewer15', 'reviewer15@mail.com', 'password', 'Reviewer'),
('reviewer16', 'reviewer16@mail.com', 'password', 'Reviewer'),
('reviewer17', 'reviewer17@mail.com', 'password', 'Reviewer'),
('reviewer18', 'reviewer18@mail.com', 'password', 'Reviewer'),
('reviewer19', 'reviewer19@mail.com', 'password', 'Reviewer'),
('reviewer20', 'reviewer20@mail.com', 'password', 'Reviewer'),
('reviewer21', 'reviewer21@mail.com', 'password', 'Reviewer'),
('reviewer22', 'reviewer22@mail.com', 'password', 'Reviewer'),
('reviewer23', 'reviewer23@mail.com', 'password', 'Reviewer'),
('reviewer24', 'reviewer24@mail.com', 'password', 'Reviewer'),
('reviewer25', 'reviewer25@mail.com', 'password', 'Reviewer')";
$conn->query($sql);
//add authors
$sql = "insert into $dbtable (name, email, password, userProfile) VALUES 
('author1', 'author1@mail.com', 'password', 'Author'),
('author2', 'author2@mail.com', 'password', 'Author'),
('author3', 'author3@mail.com', 'password', 'Author'),
('author4', 'author4@mail.com', 'password', 'Author'),
('author5', 'author5@mail.com', 'password', 'Author'),
('author6', 'author6@mail.com', 'password', 'Author'),
('author7', 'author7@mail.com', 'password', 'Author'),
('author8', 'author8@mail.com', 'password', 'Author'),
('author9', 'author9@mail.com', 'password', 'Author'),
('author10', 'author10@mail.com', 'password', 'Author'),
('author11', 'author11@mail.com', 'password', 'Author'),
('author12', 'author12@mail.com', 'password', 'Author'),
('author13', 'author13@mail.com', 'password', 'Author'),
('author14', 'author14@mail.com', 'password', 'Author'),
('author15', 'author15@mail.com', 'password', 'Author'),
('author16', 'author16@mail.com', 'password', 'Author'),
('author17', 'author17@mail.com', 'password', 'Author'),
('author18', 'author18@mail.com', 'password', 'Author'),
('author19', 'author19@mail.com', 'password', 'Author'),
('author20', 'author20@mail.com', 'password', 'Author'),
('author21', 'author21@mail.com', 'password', 'Author'),
('author22', 'author22@mail.com', 'password', 'Author'),
('author23', 'author23@mail.com', 'password', 'Author'),
('author24', 'author24@mail.com', 'password', 'Author'),
('author25', 'author25@mail.com', 'password', 'Author')";
$conn->query($sql);
//add CC
$sql = "insert into $dbtable (name, email, password, userProfile) VALUES 
('cc1', 'cc1@mail.com', 'password', 'ConferenceChair'),
('cc2', 'cc2@mail.com', 'password', 'ConferenceChair'),
('cc3', 'cc3@mail.com', 'password', 'ConferenceChair'),
('cc4', 'cc4@mail.com', 'password', 'ConferenceChair'),
('cc5', 'cc5@mail.com', 'password', 'ConferenceChair'),
('cc6', 'cc6@mail.com', 'password', 'ConferenceChair'),
('cc7', 'cc7@mail.com', 'password', 'ConferenceChair'),
('cc8', 'cc8@mail.com', 'password', 'ConferenceChair'),
('cc9', 'cc9@mail.com', 'password', 'ConferenceChair'),
('cc10', 'cc10@mail.com', 'password', 'ConferenceChair'),
('cc11', 'cc11@mail.com', 'password', 'ConferenceChair'),
('cc12', 'cc12@mail.com', 'password', 'ConferenceChair'),
('cc13', 'cc13@mail.com', 'password', 'ConferenceChair'),
('cc14', 'cc14@mail.com', 'password', 'ConferenceChair'),
('cc15', 'cc15@mail.com', 'password', 'ConferenceChair'),
('cc16', 'cc16@mail.com', 'password', 'ConferenceChair'),
('cc17', 'cc17@mail.com', 'password', 'ConferenceChair'),
('cc18', 'cc18@mail.com', 'password', 'ConferenceChair'),
('cc19', 'cc19@mail.com', 'password', 'ConferenceChair'),
('cc20', 'cc20@mail.com', 'password', 'ConferenceChair'),
('cc21', 'cc21@mail.com', 'password', 'ConferenceChair'),
('cc22', 'cc22@mail.com', 'password', 'ConferenceChair'),
('cc23', 'cc23@mail.com', 'password', 'ConferenceChair'),
('cc24', 'cc24@mail.com', 'password', 'ConferenceChair'),
('cc25', 'cc25@mail.com', 'password', 'ConferenceChair')";
$conn->query($sql);
$conn->close();

header('Location: http://localhost/314/ui');

?>