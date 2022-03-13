<?php

include_once 'header.html';
include_once 'dbinfo.php';

$prod_name = $_POST['prod_name'];
$price = (float)$_POST['price'];
$img_path = $_POST['img_path'];
$order_date = date('Y-m-d H:i:s');

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
		<section class="vh-100">
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
						<input type="email" class="form-control" name="inputEmail4" value="nh@test.com" required>
					</div>
					<div class="col-12">
						<label for="inputAddress" class="form-label">Address</label>
						<input type="text" class="form-control" name="inputAddress" value="123 Maine St" required>
					</div>
					<div class="col-12">
						<label for="inputAddress2" class="form-label">Address 2</label>
						<input type="text" class="form-control" name="inputAddress2" placeholder="Apartment, studio, or floor">
					</div>
					<div class="col-md-6">
						<label for="inputCity" class="form-label">City</label>
						<input type="text" class="form-control" name="inputCity"  value="Salt Lake City" required>
					</div>
					<div class="col-md-4">
						<label for="inputState" class="form-label">State</label>
						<select id="inputState" class="form-select">
						<option value="UT">UT</option>
						</select>
					</div>
					<div class="col-md-2">
						<label for="inputZip" class="form-label">Zip</label>
						<input type="text" class="form-control" name="inputZip"  value="84120" required>
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