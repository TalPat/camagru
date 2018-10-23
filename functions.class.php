<?php

	class Functions {

		protected $servername = "localhost";
		protected $dbusername = "root";
		protected $dbpassword = "password";
		protected $dbname = "camaguru";

	
		function ft_printheader()
		{
			if (isset($_SESSION['username']) && !empty($_SESSION['username']))
				$logstat = '<p>Logged in as '.$_SESSION[username].'</p> <a href="logout.php">Logout</a>';
			else
				$logstat = '<a href="login.php">Login</a></p>';;
				'</p> <a href="logout.php">Logout</a>';
			print(
				'<div class="header">
					<div>
						<a href="index.php"><img src="../Img/logo.png" alt=""></a>
					</div>
					<div class="menu">
						<a href="index.php">Home</a>
						<a href="gallery.php">Gallery</a>
						<a href="Users.php">Users</a>
					</div>
					<div class="login">
						'.$logstat.'
					</div>
				</div>'
			);
		}

		function ft_printfooter()
		{
			print(
				'<div class="footer">
				</div>'
			);
		}

		function ft_printhead($title)
		{
			print(
				'<head>
					<title>'.$title.'</title>
					<link rel="stylesheet" type="text/css" href="doft.css">
				</head>'
			);
		}
		
		function ft_connect_database()
		{
			try {
				$conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->dbusername, $this->dbpassword);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				echo "Connected successfully";
				return ($conn);
			}
			catch(PDOException $e) {
				echo "connection failed: ".$e->getMessage();
			}
		}

	}
?>