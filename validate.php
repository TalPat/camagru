<?php
	include_once("users.class.php");
	session_start();
	$items = new Users();
	$conn = $items->ft_connect_database();
	$out = "Your account is now active. Login <a href='login.php'>here</a>.";
	if (isset($_GET[id]) && isset($_GET[code])) {
		$sql = "SELECT * FROM Users WHERE username = '$_GET[id]'";
		try {
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			$vals = $stmt->fetchAll();
		}
		catch(PDOException $e) {
			$out = "Error:".$e;
		}
		if ($vals[0][refcode] == $_GET[code]) {
			$sql = "UPDATE Users SET confirmed='1' WHERE username='$_GET[id]'";
			try {
				$stmt = $conn->prepare($sql);
				$stmt->execute();
			}
			catch(PDOException $e) {
				$out = "Error: ".$e;
			}
		}
		else {
			$out = "Invalid link.";
		}
	}
	else {
		header("location: index.php");
	}
	$conn = null;

?>

<html lang="en">

<?php $items->ft_printhead("Bad Login"); ?>

<body>
	<div id="mainContent">

		<?php $items->ft_printheader(); ?>

		<div class="container">
			<h2>Account Validation</h2>
			<p><?php echo($out) ?></p>
		</div>

		<?php $items->ft_printfooter(); ?>

	</div>
</body>
</html>
