<?php

	include_once("users.class.php");
	session_start();
	$items = new Users();

?>

<html lang="en">

<?php $items->ft_printhead("Login"); ?>

<body>
	<div id="mainContent">

		<?php $items->ft_printheader(); ?>

		<div class="container">
			<h2>Login</h2>
			<form action="checkLogin.php" method="POST">
				<table>
					<tr><td>Username: </td><td><input type="text" name="username"></td></tr>
					<tr><td>Password: </td><td><input type="password" name="passwrd"></td></tr>
				</table>
				<br>
				<input type="submit" name="okay">
			</form>
			<p>Don't have an account? Register <a href="register.php">here</a>.</p>
		</div>

		<?php $items->ft_printfooter(); ?>

	</div>
</body>
</html>