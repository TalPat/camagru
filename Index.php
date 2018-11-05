<?php

	include_once("users.class.php");
	session_start();
	$items = new Users();

?>

<html lang="en">

<?php $items->ft_printhead("Camagru"); ?>

<body>
	<div id="mainContent">

		<?php $items->ft_printheader(); ?>

		<div class="container">
			<h2>Camagru</h2>
		</div>

		<?php $items->ft_printfooter(); ?>

	</div>
</body>
</html>