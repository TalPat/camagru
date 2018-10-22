<?php

	include_once("users.class.php");
	session_start();
	$items = new Users();
	$conn = $items->ft_connect_database();
	$sql = "SELECT * FROM Users WHERE username = '".$_POST[username]."'";
	$out = "Incorrect username or password";
	if (isset($_POST[username]) && isset($_POST[passwrd]) && isset($_POST[okay])) {
		try {
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			$out = "Error:".$e;
		}
		if (count($result) < 1)
			$out = "invalid username";
		else {
			if (hash("whirpool", $_POST[passwrd]) != $result[0][passwd])
				$out = "Invalid password";
			else {
				$_SESSION[user] = $_POST[username];
				header("location: user.php");
			}
		}
	}
	else {
		$out = "Bad Inputs";
	}


?>

<html lang="en">

<?php $items->ft_printhead("Bad Login"); ?>

<body>
	<div id="mainContent">

		<?php $items->ft_printheader(); ?>

		<div id="boxCenter">
			<h2>Unable to Log In</h2>
			<p><?php echo($out) ?></p>
		</div>

		<?php $items->ft_printfooter(); ?>

	</div>
</body>
</html>
