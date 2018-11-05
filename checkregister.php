<?php

	include_once("users.class.php");
	session_start();
	$items = new Users();
	$conn = $items->ft_connect_database();
	if ($_POST[username] != "" && $_POST[passwrd] != "" && $_POST[email] != "" && $_POST[firstname] != ""  && $_POST[lastname] != "" && isset($_POST[okay])) {
		try {
			$stmt = $conn->prepare("SELECT * FROM USERS WHERE username = '".$_POST[username]."' OR email = '".$_POST[email]."'");
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			$vals = $stmt->fetchAll();
		}
		catch(PDOException $e) {
			$out = "Error:".$e;
		}
		/*if (count($vals) < 1)*/if (1) {
			try {
				$refcode = hash("whirlpool",rand(0, 999999));
				$sql = "INSERT INTO Users (username, email, passwd, firstname, lastname, confirmed, refcode) VALUES ('$_POST[username]', '$_POST[email]', '".hash("whirlpool",$_POST[passwrd])."', '$_POST[firstname]', '$_POST[lastname]', '0', '$refcode')";
				$conn->exec($sql);
				if (mail($_POST[email], "Do not reply", "Thank you for registering with Camagru. Click on the link to activate your account <br>http://localhost:8080/camagru/validate.php?id=$_POST[username]&code=".$refcode.", From: tpatter@student.wethinkcode.co.za"))
					$out = "A verification email has been sent, click the link in the email to validate your account.";
				else
				$out = "Failed to send verification mail";
			}
			catch(PDOException $e) {
				$out = "Error:".$e;
			}
		}
		else {
			$out = "Username or email already in use.";
		}
	}
	else {
		$out = "Bad Inputs";
	}
	$conn = null;

?>

<html lang="en">

<?php $items->ft_printhead("Mail Sent"); ?>

<body>
	<div id="mainContent">

		<?php $items->ft_printheader(); ?>

		<div class="container">
			<h2>Registration to Camagru</h2>
			<p><?php echo($out) ?></p>
		</div>

		<?php $items->ft_printfooter(); ?>

	</div>
</body>
</html>
