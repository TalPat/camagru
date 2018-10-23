<?PHP
	session_start();
	include_once("admins.class.php");
	$items = new Admins();
	//ft_admincheck();

	$dbname = $_POST[dbname];
	$servername = $_POST[servername];
	$username = $_POST[username];
	$passwrd = $_POST[passwrd];

	$items->ft_create_database($servername, $username, $passwrd, $dbname);
	$conn = $items->ft_connect_database($servername, $username, $passwrd, $dbname);
	try {
		$sql = "CREATE TABLE Users (
			id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			username VARCHAR(30) NOT NULL,
			email VARCHAR(255) NOT NULL,
			passwd VARCHAR(1000) NOT NULL,
			firstname VARCHAR(45) NOT NULL,
			lastname VARCHAR(45) NOT NULL,
			refcode varchar(1000) NOT NULL,
			confirmed int(1) NOT NULL
		)";
		$conn->exec($sql);
		echo "Table 'Users' created successfully";
	}
	catch(PDOException $e) {
		echo $sql."<br>".$e->getMessage();
	}
	try {
		$sql = "CREATE TABLE Images (
			id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			imagename VARCHAR(30) NOT NULL,
			userid int(10) NOT NULL,
			votes int(10) NOT NULL
		)";
		$conn->exec($sql);
		echo "Table 'Images' created successfully";
	}
	catch(PDOException $e) {
		echo $sql."<br>".$e->getMessage();
	}
	$conn = null;
?>
