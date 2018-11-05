<?php

	include_once("users.class.php");
	session_start();
	$items = new Users();
	$conn = $items->ft_connect_database();
	$sql = "SELECT * FROM Users WHERE username = '".$_POST[username]."' AND confirmed = '1'";
	$out = "Incorrect username or password";
	if ($_POST[username] != "" && $_POST[passwrd] != "" && isset($_POST[okay])) {
		try {
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			$vals = $stmt->fetchAll();
		}
		catch(PDOException $e) {
			$out = "Error:".$e;
		}
		if (count($vals) < 1)
			$out = "invalid username";
		else {
			if (hash("whirlpool", $_POST[passwrd]) != $vals[0][passwd])
				$out = "Invalid password";
			else {
				$_SESSION[user] = $_POST[username];
				$conn = null;
				header("location: user.php");
			}
		}
	}
	else {
		$out = "Bad Inputs";
	}
	$conn = null;

?>

<html lang="en">

<?php $items->ft_printhead("Bad Login"); ?>

<body>
	<div id="mainContent">

		<?php $items->ft_printheader(); ?>

		<div class="container">
			<h2>Unable to Log In</h2>
			<p><?php echo($out) ?></p>
		</div>

		<?php $items->ft_printfooter(); ?>

	</div>
</body>
</html>
