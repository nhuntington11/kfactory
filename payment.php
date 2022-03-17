<?php

$page_roles = array('admin', 'employee', 'customer');

include_once 'check_session.php';
include_once 'header.html';
include_once 'dbinfo.php';

$prod_id = $_POST['prod_id'];
$prod_name = $_POST['prod_name'];
$price = (float)$_POST['price'];
$img_path = $_POST['img_path'];
$order_date = date('Y-m-d H:i:s');
$user_id = $_SESSION['user']->user_id;
$username = $_SESSION['user']->username;
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

if (isset($_POST['username'])) {
	$conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error) echo "CONNECTION ERROR";

	$card = $_POST['cc'];

	$available_amount_query = $conn->query("SELECT amount FROM cust_payment_type WHERE payment_key = $card");
	$row = $available_amount_query->fetch_array(MYSQLI_ASSOC);
	$available_amount = $row['amount'];

	if ($price > $available_amount) {
		echo "COULD NOT CHARGE CARD, ORDER FAILED";
	} else {
		$charge_query = $conn->query("UPDATE cust_payment_type SET amount = amount - $price WHERE payment_key = $card");
		if (!$charge_query) echo "ERROR";
		
		$order_query = "INSERT INTO orders (user_id, purchase_date, prod, prod_id, total_price, quantity) VALUES ($user_id, '$order_date', '$prod_name', $prod_id, $price, 1)";

		$order_result = $conn->query($order_query);
		if (!$order_result) echo "ERROR";

		$quantity_result = $conn->query("UPDATE product SET quantity = quantity - 1 WHERE prod_id = $prod_id");
		if (!$quantity_result) echo "COULD NOT UPDATE QUANTITY";

		$get_new_order_id = $conn->query("SELECT order_id FROM orders ORDER BY purchase_date DESC LIMIT 1");
		$order_id_row = $get_new_order_id->fetch_array(MYSQLI_ASSOC);
		$order_id = $order_id_row['order_id'];

		$payment_update_query = $conn->query("INSERT INTO payment (order_id, user_id, payment_id) VALUES ($order_id, $user_id, $card)");
		if (!$payment_update_query) echo "COULD NOT INSERT INTO PAYMENT";

		header('Location: order-history.php');
	}
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
_NAV;

$payment_query = $conn->query("SELECT * FROM cust_payment_type WHERE user_id = $user_id");
$payment_rows = $payment_query->num_rows;

if ($payment_rows == 0) {
	echo "PLEASE ADD A PAYMENT METHOD <a href='update-user.php?user_id=$user_id'>here</a>";
} else {

	echo <<<_CCFORM
	<form action="payment.php" method="post">
		<select name="cc" class="form-control">
	_CCFORM;

	for ($i=0; $i<$payment_rows; ++$i) {
		$payment_query->data_seek($i);
		$card = $payment_query->fetch_array(MYSQLI_ASSOC);

		$card_id = $card['payment_key'];
		$card_num = $card['cc_num'];

		echo "<option name='card' value=$card_id>$card_num</option>";
	}

	echo <<<_ENDCCFORM
		</select>
	_ENDCCFORM;

	echo <<<_FORM
						<div class="col-md-6">
							<label for="username" class="form-label">Username</label>
							<input type="username" class="form-control" name="username" value="$username" required>
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
							<input type="hidden" name="prod_id" value="$prod_id">
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
	_FORM;
}

include_once 'footer.html';

?>