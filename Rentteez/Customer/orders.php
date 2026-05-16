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
	<meta name="keywords" content="rentteez, orders">

	<link rel="preconnect" href="https://fonts.gstatic.com/">
	<link rel="shortcut icon" href="assets/img/icons/icon-48x48.png" />

	<link rel="canonical" href="pages-orders-2.html" />

	<title>Orders | Rentteez</title>

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
						<h1 class="h3 d-inline align-middle">Orders</h1>
					</div>

					<div class="card">
						<div class="card-header pb-0">
							<div class="card-actions float-end">
								<div class="dropdown position-relative">
									<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
										<i class="align-middle" data-feather="more-horizontal"></i>
									</a>

									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
							</div>
							<h5 class="card-title mb-0">Orders</h5>
						</div>
						<div class="card-body">
							<table id="datatables-orders" class="table table-responsive table-striped" width="100%">
								<thead>
									<tr>
										<th>#</th>
										<th>Billing Name</th>
										<th>Date</th>
										<th>Total</th>
										<th>Payment Status</th>
										<th>Payment Method</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><strong>#0001</strong></td>
										<td>Brian Smith</td>
										<td>2023-12-04</td>
										<td>$353.00</td>
										<td><span class="badge badge-success-light">Paid</span></td>
										<td><i class="fab fa-cc-mastercard me-1"></i> Mastercard</td>
										<td>
											<a href="#" class="btn btn-primary btn-sm">View</a>
											<a href="#" class="btn btn-primary btn-sm">Edit</a>
										</td>
									</tr>
									<tr>
										<td><strong>#0002</strong></td>
										<td>Patrick Babcock</td>
										<td>2023-12-05</td>
										<td><s>$939.00</s></td>
										<td><span class="badge badge-danger-light">Chargeback</span></td>
										<td><i class="fab fa-cc-visa me-1"></i> Visa</td>
										<td>
											<a href="#" class="btn btn-primary btn-sm">View</a>
											<a href="#" class="btn btn-primary btn-sm">Edit</a>
										</td>
									</tr>
									<tr>
										<td><strong>#0003</strong></td>
										<td>Ronald Woods</td>
										<td>2023-12-12</td>
										<td><s>$965.00</s></td>
										<td><span class="badge badge-warning-light">Refunded</span></td>
										<td><i class="fab fa-cc-visa me-1"></i> Visa</td>
										<td>
											<a href="#" class="btn btn-primary btn-sm">View</a>
											<a href="#" class="btn btn-primary btn-sm">Edit</a>
										</td>
									</tr>
									<tr>
										<td><strong>#0004</strong></td>
										<td>Morris Evans</td>
										<td>2023-12-21</td>
										<td>$247.00</td>
										<td><span class="badge badge-success-light">Paid</span></td>
										<td><i class="fab fa-cc-mastercard me-1"></i> Mastercard</td>
										<td>
											<a href="#" class="btn btn-primary btn-sm">View</a>
											<a href="#" class="btn btn-primary btn-sm">Edit</a>
										</td>
									</tr>
									<tr>
										<td><strong>#0005</strong></td>
										<td>Kirk Batts</td>
										<td>2022-01-05</td>
										<td>$187.00</td>
										<td><span class="badge badge-success-light">Paid</span></td>
										<td><i class="fab fa-cc-visa me-1"></i> Visa</td>
										<td>
											<a href="#" class="btn btn-primary btn-sm">View</a>
											<a href="#" class="btn btn-primary btn-sm">Edit</a>
										</td>
									</tr>
									<tr>
										<td><strong>#0006</strong></td>
										<td>Mark Lebron</td>
										<td>2022-01-11</td>
										<td>$784.00</td>
										<td><span class="badge badge-success-light">Paid</span></td>
										<td><i class="fab fa-cc-mastercard me-1"></i> Mastercard</td>
										<td>
											<a href="#" class="btn btn-primary btn-sm">View</a>
											<a href="#" class="btn btn-primary btn-sm">Edit</a>
										</td>
									</tr>
									<tr>
										<td><strong>#0007</strong></td>
										<td>Waylon Atkinson</td>
										<td>2022-02-01</td>
										<td>$258.00</td>
										<td><span class="badge badge-success-light">Paid</span></td>
										<td><i class="fab fa-cc-mastercard me-1"></i> Mastercard</td>
										<td>
											<a href="#" class="btn btn-primary btn-sm">View</a>
											<a href="#" class="btn btn-primary btn-sm">Edit</a>
										</td>
									</tr>
									<tr>
										<td><strong>#0008</strong></td>
										<td>David Larose</td>
										<td>2022-02-26</td>
										<td><s>$933.00</s></td>
										<td><span class="badge badge-danger-light">Chargeback</span></td>
										<td><i class="fab fa-cc-visa me-1"></i> Visa</td>
										<td>
											<a href="#" class="btn btn-primary btn-sm">View</a>
											<a href="#" class="btn btn-primary btn-sm">Edit</a>
										</td>
									</tr>
									<tr>
										<td><strong>#0009</strong></td>
										<td>Shawn Rapp</td>
										<td>2022-03-09</td>
										<td>$928.00</td>
										<td><span class="badge badge-success-light">Paid</span></td>
										<td><i class="fab fa-cc-visa me-1"></i> Visa</td>
										<td>
											<a href="#" class="btn btn-primary btn-sm">View</a>
											<a href="#" class="btn btn-primary btn-sm">Edit</a>
										</td>
									</tr>
									<tr>
										<td><strong>#0010</strong></td>
										<td>Chad Smith</td>
										<td>2022-03-17</td>
										<td><s>$715.00</s></td>
										<td><span class="badge badge-warning-light">Refunded</span></td>
										<td><i class="fab fa-cc-visa me-1"></i> Visa</td>
										<td>
											<a href="#" class="btn btn-primary btn-sm">View</a>
											<a href="#" class="btn btn-primary btn-sm">Edit</a>
										</td>
									</tr>
									<tr>
										<td><strong>#0011</strong></td>
										<td>Kenneth Garcia</td>
										<td>2022-04-06</td>
										<td>$534.00</td>
										<td><span class="badge badge-success-light">Paid</span></td>
										<td><i class="fab fa-cc-mastercard me-1"></i> Mastercard</td>
										<td>
											<a href="#" class="btn btn-primary btn-sm">View</a>
											<a href="#" class="btn btn-primary btn-sm">Edit</a>
										</td>
									</tr>
									<tr>
										<td><strong>#0012</strong></td>
										<td>Charles Trombly</td>
										<td>2022-04-19</td>
										<td><s>$334.00</s></td>
										<td><span class="badge badge-warning-light">Refunded</span></td>
										<td><i class="fab fa-cc-visa me-1"></i> Visa</td>
										<td>
											<a href="#" class="btn btn-primary btn-sm">View</a>
											<a href="#" class="btn btn-primary btn-sm">Edit</a>
										</td>
									</tr>
									<tr>
										<td><strong>#0013</strong></td>
										<td>Carlton Dillow</td>
										<td>2022-05-09</td>
										<td>$874.00</td>
										<td><span class="badge badge-success-light">Paid</span></td>
										<td><i class="fab fa-cc-mastercard me-1"></i> Mastercard</td>
										<td>
											<a href="#" class="btn btn-primary btn-sm">View</a>
											<a href="#" class="btn btn-primary btn-sm">Edit</a>
										</td>
									</tr>
									<tr>
										<td><strong>#0014</strong></td>
										<td>Hubert Ezell</td>
										<td>2022-05-14</td>
										<td>$963.00</td>
										<td><span class="badge badge-success-light">Paid</span></td>
										<td><i class="fab fa-cc-visa me-1"></i> Visa</td>
										<td>
											<a href="#" class="btn btn-primary btn-sm">View</a>
											<a href="#" class="btn btn-primary btn-sm">Edit</a>
										</td>
									</tr>
									<tr>
										<td><strong>#0015</strong></td>
										<td>Paul Banks</td>
										<td>2022-06-03</td>
										<td><s>$898.00</s></td>
										<td><span class="badge badge-warning-light">Refunded</span></td>
										<td><i class="fab fa-cc-visa me-1"></i> Visa</td>
										<td>
											<a href="#" class="btn btn-primary btn-sm">View</a>
											<a href="#" class="btn btn-primary btn-sm">Edit</a>
										</td>
									</tr>
								</tbody>
							</table>
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

	<script src="../demo.adminkit.io/js/datatables.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Orders
			$("#datatables-orders").DataTable({
				responsive: true,
				aoColumnDefs: [{
					bSortable: false,
					aTargets: [-1]
				}]
			});
		});
	</script>

</body>


</html>
