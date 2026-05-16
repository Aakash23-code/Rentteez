<?php
/*
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
*/
?>
<!DOCTYPE html>
<html lang="en">



<head>
	<base href="<?php echo dirname($_SERVER['PHP_SELF'], 2) . '/'; ?>">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="rentteez, notifications">

	<link rel="preconnect" href="https://fonts.gstatic.com/">
	<link rel="shortcut icon" href="assets/img/icons/icon-48x48.png" />

	<link rel="canonical" href="notifications-2.html" />

	<title>Notifications | Rentteez</title>

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">

	<!-- Choose your prefered color scheme -->
	<!-- <link href="assets/css/light.css" rel="stylesheet"> -->
	<!-- <link href="css/dark.css" rel="stylesheet"> -->

	<!-- BEGIN SETTINGS -->
	<!-- Remove this after purchasing -->
	<link class="js-stylesheet" href="assets/css/light.css" rel="stylesheet">
	<script src="assets/adminkit/settings.js"></script>
	<style>
		body {
			opacity: 0;
		}
	</style>
	<!-- END SETTINGS -->
</head>
<!--
  HOW TO USE: 
  data-theme: default (default), dark, light, colored
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-layout: default (default), compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
	<div class="wrapper">
        <?php include '../components/navbar.php'; ?>


		<div class="main">


			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Notifications</h1>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="card mb-4">
								<div class="card-header">
									<h5 class="card-title">Toast notifications</h5>
									<h6 class="card-subtitle text-muted">Notyf is a minimalistic JavaScript library for toast notifications. See official
										documentation <a href="https://github.com/caroso1222/notyf" target="_blank" rel="noopener noreferrer nofollow">here</a>.
									</h6>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-xs-12 col-md-8">
											<div class="mb-3">
												<label class="form-label" for="notyf-message">Message</label>
												<input id="notyf-message" name="notyf-message" type="text" class="form-control" placeholder="Enter a message">
											</div>
											<div class="mb-3">
												<label class="form-label" for="notyf-type">Type</label>
												<select class="form-select" id="notyf-type" name="notyf-type">
													<option value="default" selected>Default</option>
													<option value="success">Success</option>
													<option value="warning">Warning</option>
													<option value="danger">Danger</option>
												</select>
											</div>
											<div class="mb-3">
												<label class="form-label" for="notyf-duration">Duration</label>
												<select class="form-select" id="notyf-duration" name="notyf-duration">
													<option value="2500">2.5s</option>
													<option value="5000" selected>5s</option>
													<option value="7500">7.5s</option>
													<option value="10000">10s</option>
												</select>
											</div>
											<label class="form-check">
												<input class="form-check-input" type="checkbox" id="notyf-ripple" checked>
												<span class="form-check-label">
													With ripple
												</span>
											</label>
											<label class="form-check">
												<input class="form-check-input" type="checkbox" id="notyf-dismissible">
												<span class="form-check-label">
													Dismissible
												</span>
											</label>
										</div>
										<div class="col-xs-12 col-md-4">
											<div class="mb-3">
												<label class="form-label mb-2">Position X</label>
												<label class="form-check">
													<input type="radio" name="notyf-position-x" class="form-check-input" value="left">
													<span class="form-check-label">Left</span>
												</label>
												<label class="form-check">
													<input type="radio" name="notyf-position-x" class="form-check-input" value="center">
													<span class="form-check-label">Center</span>
												</label>
												<label class="form-check">
													<input type="radio" name="notyf-position-x" class="form-check-input" value="right" checked>
													<span class="form-check-label">Right</span>
												</label>
											</div>
											<div class="mb-3">
												<label class="form-label mb-2">Position Y</label>
												<label class="form-check">
													<input type="radio" name="notyf-position-y" class="form-check-input" value="top" checked>
													<span class="form-check-label">Top</span>
												</label>
												<label class="form-check">
													<input type="radio" name="notyf-position-y" class="form-check-input" value="bottom">
													<span class="form-check-label">Bottom</span>
												</label>
											</div>
										</div>
									</div>

									<hr>

									<button class="btn btn-primary me-1" id="notyf-show">Show notification</button>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a href="#" class="text-muted"><strong>Rentteez</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="assets/adminkit/adminkit.js"></script>

	<script>
		// Notyf
		document.addEventListener("DOMContentLoaded", function() {
			var currentMessageIndex = -1;

			function getMessage() {
				var messages = [
					"My name is Inigo Montoya. You killed my father. Prepare to die!",
					"Are you the six fingered man?",
					"Inconceivable!",
					"I do not think that means what you think it means.",
					"Have fun storming the castle!",
				];
				currentMessageIndex++;
				if (currentMessageIndex === messages.length) {
					currentMessageIndex = 0;
				}
				return messages[currentMessageIndex];
			};
			document.querySelector("#notyf-show").addEventListener("click", function() {
				var message = document.querySelector("#notyf-message").value || getMessage();
				var type = document.querySelector("#notyf-type").value;
				var duration = document.querySelector("#notyf-duration").value;
				var ripple = document.querySelector("#notyf-ripple").checked;
				var dismissible = document.querySelector("#notyf-dismissible").checked;
				var positionX = document.querySelector("input[name=\"notyf-position-x\"]:checked").value;
				var positionY = document.querySelector("input[name=\"notyf-position-y\"]:checked").value;
				window.notyf.open({
					type,
					message,
					duration,
					ripple,
					dismissible,
					position: {
						x: positionX,
						y: positionY
					}
				});
			});
		});
	</script>

</body>


</html>
