<?php

	include_once("users.class.php");
	session_start();
	$items = new Users();

?>

<html lang="en">

<?php $items->ft_printhead("Register"); ?>

<body>
	<div id="mainContent">

		<?php $items->ft_printheader(); ?>

		<div id="boxCenter">
			<h2>Register</h2>
			<form action="checkRegister.php" method="POST">
				<table>
					<tr><td>Username: </td><td><input type="text" name="username" required></td></tr>
					<tr><td>Email: </td><td><input type="text" name="email" required></td></tr>
					<tr><td>Password: </td><td><input type="password" name="passwrd" required></td></tr>
				</table>
				<br>
				<input type="submit" name="okay">
			</form>
			<p>Already have an account? Log in <a href="login.php">here</a>.</p>
		</div>

		<?php $items->ft_printfooter(); ?>

	</div>
</body>
</html>