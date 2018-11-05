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
			<video id="video" width='100%' autoplay style="transform: rotateY(180deg);"></video>
			<br>
			<br>
			<button class="capture-button">Take Picture</button><button class="filter-button">Add Filter</button>
			<img src=" " class="my-pic" width='100%'>
			<canvas style="display: none;"></canvas>
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
	else {
		alert('getUserMedia() is not supported by your browser');
	}

	const captureVideoButton = document.querySelector('#screenshot .capture-button');
	const screenshotButton = document.querySelector('.capture-button');
	const img = document.querySelector('.my-pic');
	const cssFiltersButton = document.querySelector('.filter-button');

	const canvas = document.createElement('canvas');

	// captureVideoButton.onclick = function() {
	// 	navigator.mediaDevices.getUserMedia(constraints).then(handleSuccess).catch(handleError);
	// };

	var filterIndex = 0;
	const filters = [
		'grayscale',
		'sepia',
		'blur',
		'brightness',
		'contrast',
		'hue-rotate',
		'hue-rotate2',
		'hue-rotate3',
		'saturate',
		'invert',
		''
	];

	screenshotButton.onclick = function() {
		canvas.width = video.videoWidth;
		canvas.height = video.videoHeight;
		canvas.getContext('2d').drawImage(video, 0, 0);
		// Other browsers will fall back to image/png
		img.src = canvas.toDataURL('image/webp');
		document.querySelector('canvas').style.display = "block";
	};

	cssFiltersButton.onclick = video.onclick = function() {
		//video.className = filters[filterIndex++ % filters.length];
		video.style.WebkitFilter = filters[filterIndex++ % filters.length]+'(100%)';
	};

	function handleSuccess(stream) {
		screenshotButton.disabled = false;
		video.srcObject = stream;
	}
</script>
</html>
