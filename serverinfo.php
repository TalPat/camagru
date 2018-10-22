<?php

	session_start();
	include_once("admins.class.php");
	$items = new Admins();
	//ft_admincheck();

?>

<html lang="en">
<?php $items->ft_printhead('Create Database'); ?>

<body class="body">
	<?php $items->ft_printheader(); ?>
	<div class="maincontent">
		<h2>Create Database</h2>
		<form action="install.php" method="POST">
			Database name:<br>
			<input type="text" name="dbname"><br>
			Server name:<br>
			<input type="text" name="servername"><br>
			User name:<br>
			<input type="text" name="username"><br>
			Password:<br>
			<input type="text" name="passwrd"><br>
			<input type="submit" name="OK">
		</form>
	</div>
	<?php $items->ft_printfooter(); ?>
</body>
</html>