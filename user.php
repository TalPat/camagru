<?php

	include_once("users.class.php");
	session_start();
	if (!isset($_SESSION[user]))
		header("location: index.php");
	$items = new Users();

?>

<html lang="en">

<?php $items->ft_printhead("Camagru"); ?>

<body>
	<div id="mainContent">

		<?php $items->ft_printheader(); ?>

		<div id="boxCenter">
			<h2><?php print($_SESSION[user]) ?>'s Profile</h2>
		</div>

		<?php $items->ft_printfooter(); ?>

	</div>
</body>
</html>