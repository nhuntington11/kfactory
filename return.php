<?php

$page_roles = array('admin', 'employee', 'customer');

require_once 'check_session.php';
require_once 'header.html';
require_once 'dbinfo.php';

$user_id = $_SESSION['user']->user_id;

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
				<li class="nav-item">
					<a class="nav-link" href="update-user.php?user_id=$user_id">My Account</a>
			  	</li>
				<li class="nav-item">
				  <a class="nav-link" href="order-history.php">Order History</a>
				</li>
			</ul>
		</div>
	</div>
	</nav>
</header>

<div class="container">
	<div class="row">
		<div class="col">
			<h3>Returns</h3>
		</div>
	</div>
_NAV;

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die ($conn->connect_error);

if (isset($_POST['returned'])) {
	$order_id = (int)$_POST['order_id'];
	$quantity = (int)$_POST['quantity'];
	$prod_id = (int)$_POST['prod_id'];

	$return_query = $conn->query("INSERT INTO returns (order_id, quantity) VALUES ($order_id, $quantity)");
	if (!$return_query) echo "COULD NOT PROCESS RETURN please contact <a href='order-history.php'>customer support</a>";

	$update_order_query = $conn->query("UPDATE orders SET returned = 1 WHERE order_id = $order_id");
	if (!$update_order_query) echo "COULD NOT UPDATE ORDER HISTORY BUT RETURN IS PROCESSED please contact <a href='order-history.php'>customer support</a>";

	$update_quantity_query = $conn->query("UPDATE product SET quantity = quantity + 1 WHERE prod_id = $prod_id");
	if (!$update_quantity_query) echo "COULD NOT UPDATE QUANTITY please contact <a href='order-history.php'>customer support</a>";
}

if (in_array('employee', $user_roles)) {
	$return_query = $conn->query("SELECT * FROM returns as r INNER JOIN orders as o ON r.order_id = o.order_id INNER JOIN users as u ON o.user_id = u.user_id");
} else {
	$return_query = $conn->query("SELECT * FROM returns as r INNER JOIN orders as o ON r.order_id = o.order_id INNER JOIN users as u ON o.user_id = u.user_id WHERE o.user_id = $user_id");
}

$rows = $return_query->num_rows;

for ($i=0; $i<$rows; ++$i) {
	$return_query->data_seek($i);
	$return = $return_query->fetch_array(MYSQLI_ASSOC);

	echo <<<_RETURN
	<div class="row mt-2 mb-2 border border-success">
		<div class="col p-2">
			<div class="row">
				<div class="col-4">
					<p>Order Date: $return[purchase_date]</p>
				</div>
				<div class="col-4">
					<p>Product: $return[prod] Skis</p>
				</div>
				<div class="col-4">
					<p>Customer: $return[firstname] $return[lastname]</p>
				</div>
				<div class ="row">
					<div class="col-4">
						<p>Date Returned: $return[date_returned]</p>
					</div>
					<div class="col-4">
						<p>Order Number: $return[order_id]</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	_RETURN;
}

$conn->close();

require_once 'footer.html';

?>