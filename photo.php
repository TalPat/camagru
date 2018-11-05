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

		<div class="container">
			<h2>Take a Pic</h2>
			<video id="video" width='100%' autoplay></video>
			<br>
			<br>
			<button>Take Picture</button>
		</div>

		<?php $items->ft_printfooter(); ?>

	</div>
</body>
<script>
	var video = document.getElementById('video');
	if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
		navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
		video.src = window.URL.createObjectURL(stream);
		video.play();
		});
	}
</script>
</html>
