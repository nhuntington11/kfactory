<?php

$page_roles = array('admin', 'employee', 'customer');

include_once 'check_session.php';
include_once 'header.html';
include_once 'dbinfo.php';

$prod_name = $_POST['prod_name'];
$price = (float)$_POST['price'];
$img_path = $_POST['img_path'];
$order_date = date('Y-m-d H:i:s');
$email = $_SESSION['user']->email;
$firstname = $_SESSION['user']->firstname;
$lastname = $_SESSION['user']->lastname;
$address1 = $_SESSION['user']->address1;
if ($_SESSION['user']->address2) {
	$address2 = $_SESSION['user']->address2;
} else {
	$address2 = "";
}
$city = $_SESSION['user']->city;
$state = $_SESSION['user']->state;
$zip = $_SESSION['user']->zip;

if (isset($_POST['inputEmail4'])) {
	$conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error) echo "CONNECTION ERROR";

	$order_query = "INSERT INTO orders (purchase_date, total_price) VALUES ('$order_date', $price)";

	$order_result = $conn->query($order_query);
	if (!$order_result) echo gettype($price).gettype($order_date);


}

echo <<<_NAV
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="index.php">Kitten Factory</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
					<a class="nav-link" aria-current="page" href="index.php">Home</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>

<body>		
	<div class="container">
		<section class="vh-110">
			<div class="container py-5 h-100">
				<div class="row">
					<div class="col">
						<table class="table">
							<thead>
								<th>Product</th>
								<th>Price</th>
								<th></th>
							</thead>
							<tbody>
								<tr>
									<td>$prod_name</td>
									<td>$price</td>
									<td><img src="$img_path" class="img-fluid"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<form class="row g-3 mt-5" action="payment.php" method="post">
					<div class="col-md-6">
						<label for="inputEmail4" class="form-label">Email</label>
						<input type="email" class="form-control" name="inputEmail4" value="$email" required>
					</div>
					<div class="col-12">
						<label for="firstname" class="form-label">Address</label>
						<input type="text" class="form-control" name="firstname" value="$firstname" required>
					</div>
					<div class="col-12">
						<label for="lastname" class="form-label">Address</label>
						<input type="text" class="form-control" name="lastname" value="$lastname" required>
					</div>
					<div class="col-12">
						<label for="inputAddress" class="form-label">Address</label>
						<input type="text" class="form-control" name="inputAddress" value="$address1" required>
					</div>
					<div class="col-12">
						<label for="inputAddress2" class="form-label">Address 2</label>
						<input type="text" class="form-control" name="$address2" placeholder="Apartment, studio, or floor">
					</div>
					<div class="col-md-6">
						<label for="inputCity" class="form-label">City</label>
						<input type="text" class="form-control" name="inputCity"  value="$city" required>
					</div>
					<div class="col-md-4">
						<label for="inputState" class="form-label">State</label>
						<select id="inputState" class="form-select">
						<option value="UT">UT</option>
						</select>
					</div>
					<div class="col-md-2">
						<label for="zip" class="form-label">Zip</label>
						<input type="text" class="form-control" name="zip"  value="$zip" required>
					</div>
					<div class="col-12">
						<input type="hidden" name="prod_name" value="$prod_name">
						<input type="hidden" name="price" value=$price>
						<input type="hidden" name="img_path" value="$img_path">
						<button type="submit" class="btn btn-primary">Submit Order</button>
					</div>
				</form>
				<div class="col-12 mt-1">
					<a role="button" class="btn btn-secondary" href="index.php">Cancel</a>
				</div>
			</div>
		</section>
	</div>
</body>
_NAV;

include_once 'footer.html';

?>