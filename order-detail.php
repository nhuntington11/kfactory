<?php

$page_roles = array('admin', 'employee', 'customer');

require_once 'check_session.php';
require_once 'header.html';
require_once 'dbinfo.php';

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
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="order-history.php">Order History</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="update-user.php">My Account</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</div>`
	</nav>
</header>
<div class="container">
	<div class="row m-2">
		<div class="col">
			<h3>Orders</h3>
		</div>
	</div>
_NAV;

if (isset($_GET['orderid'])) {
	$order_id = $_GET['orderid'];

	$conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error) die ($conn->connect_error);

	$query = "SELECT * FROM orders WHERE order_id = $order_id";

	$result = $conn->query($query);
	if (!$result) echo "INVALID QUERY FOR $order_id";

	$order = $result->fetch_array(MYSQLI_ASSOC);

	$user_id = $order['user_id'];
	$order_date = $order['purchase_date'];
	$product = $order['prod'];
	$fulfilled = $order['fulfilled'];
	$returned = $order['returned'];

	$get_user = "SELECT * FROM users WHERE user_id = $user_id UNION SELECT * FROM deactivated_accounts WHERE user_id = $user_id";

	$user_result = $conn->query($get_user);
	if (!$user_result) echo "NO USER OF USERID $user_id";

	$user_row = $user_result->fetch_array(MYSQLI_ASSOC);

	$firstname = $user_row['firstname'];
	$lastname = $user_row['lastname'];

	$checked = "";
	$border = "border-danger";
	if ($fulfilled) {
		$checked = "checked";
	}
	
	$submit = "";
	if (in_array('employee', $user_roles)) {
		$submit = "<input type='submit' value='Submit'>";
	}

	if ($returned) {
		$fulfill_html = "";
		$return = "<h4>RETURNED</h4>";
		$border = "border-success";
	} else {
		$return = "";
		$fulfill_html = "<form action='order-detail.php' method='post'>
		<input type='hidden' name='orderid' value='$order_id'>
		<input type='hidden' name='update' value='update'>
		<label class='form-label' for='fulfilled'>Fulfilled?</label>
		<input type='checkbox' class='form-check-input' name='fulfilled' value='1' $checked>
		$submit
		</form>";
		$checked = "checked";
	}

	echo <<<_ORDER
		<div class="row mt-2 mb-2 border rounded $border">
			<div class="col p-2">
				<div class="row">
					<div class="col-4">
						<p>Order Date: $order_date</p>
					</div>
					<div class="col-4">
						<p>Product: Atomic Skis</p>
					</div>
					<div class="col-4">
						<p>Shipped To: $firstname $lastname</p>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<p>Description: 1 pair $product Skis ordered</p>
					</div>
					<div class="col-4">
						$return
					</div>
					<div class="col">
						$fulfill_html
					</div>
				</div>
			</div>
		</div>
	_ORDER;
}

if (isset($_POST['update'])) {
	$order_id = $_POST['orderid'];

	if (isset($_POST['fulfilled'])) {
		$new_fulfilled = 1;
	} else {
		$new_fulfilled = 0;
	}

	$order_result = $conn->query("UPDATE orders SET fulfilled = $new_fulfilled WHERE order_id = $order_id");
	if (!$order_result) echo "COULD NOT QUERY DATABASE WITH ID $order_id";

	$shipping_result = $conn->query("INSERT INTO shipping (order_id, shipping_cost) VALUES ($order_id, 15.00)");
	if (!$shipping_result) echo "COULD NOT UPDATE SHIPPING";

	header('Location: order-history.php');
}

include_once 'footer.html';

?>