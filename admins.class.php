<?php

	include_once("functions.class.php");

	class Admins extends Functions{

		function ft_create_database()
		{
			try {
				$conn = new PDO("mysql:host=$this->servername", $this->dbusername, $this->dbpassword);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "CREATE DATABASE IF NOT EXISTS $this->dbname";
				$conn->exec($sql);
				echo "Database successfully created<br>";
			}
			catch(PDOException $e) {
				echo $sql."<br>".$e->getMessage();
			}
		}

		function ft_admincheck()
		{
			if (!$_SESSION[admin])
				header('location: index.php');
		}
		
	}

?>
