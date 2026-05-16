<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com/">
	<link rel="shortcut icon" href="assets/images/favicon.ico" />

	<title>Navbar Test | Rentteez</title>

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">

	<!-- AdminKit CSS -->
	<link rel="stylesheet" href="assets/css/light.css">

    <!-- AdminKit Settings JS (Must be in head for theme init) -->
    <script src="assets/adminkit/settings.js"></script>

    <style>
		body {
			opacity: 0;
		}
	</style>
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
	<div class="wrapper">
		
        <?php include 'components/navbar.php'; ?>

			<main class="content">
				<div class="container-fluid p-0">

					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3><strong>Testing</strong> Navbar Component</h3>
						</div>
					</div>
					
                    <div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Component Status</h5>
								</div>
								<div class="card-body">
									<p>The sidebar and top navbar have been successfully modularized into <code>components/navbar.php</code>.</p>
                                    <p>Assets are currently being linked from the <code>demo.adminkit.io</code> directory.</p>
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
								<a href="#" class="text-muted"><strong>Rentteez</strong></a> &copy; 2026
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<!-- AdminKit JS -->
	<script src="assets/adminkit/adminkit.js"></script>

</body>

</html>
