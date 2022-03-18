<?php

$page_roles = array('admin', 'employee', 'customer');

require_once 'check_session.php';
require_once 'header.html';
require_once 'dbinfo.php';

$user_id = $_SESSION['user']->user_id;

// Navbar options
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

	// Get order information
	$order_query = $conn->query("SELECT * 
								 FROM orders 
								 WHERE order_id = $order_id");
	if (!$order_query) echo "COULD NOT FETCH ORDER please contact <a href='order-history.php'>customer support</a>";

	$order = $order_query->fetch_array(MYSQLI_ASSOC);

	// Add order to returns
	$return_query = $conn->query("INSERT INTO returns (order_id, quantity) 
								  VALUES ($order_id, $order[quantity])");
	if (!$return_query) echo "COULD NOT PROCESS RETURN please contact <a href='order-history.php'>customer support</a>";

	// Update order to 'returned'
	$update_order_query = $conn->query("UPDATE orders 
										SET returned = 1 
										WHERE order_id = $order_id");
	if (!$update_order_query) echo "COULD NOT UPDATE ORDER HISTORY BUT RETURN IS PROCESSED please contact <a href='order-history.php'>customer support</a>";

	// Return money
	// User deactivated and therefore card removed
	$user_card = $conn->query("SELECT * FROM cust_payment_type WHERE user_id = $order[user_id]");
	if (!$user_card) echo "COULD NOT CONNECT TO DB";

	if ($user_card->num_rows != 0) {
		$update_card_query = $conn->query("UPDATE cust_payment_type 
										   SET amount = amount + $order[total_price] 
										   WHERE user_id = $order[user_id]");
		if (!$update_card_query) echo "COULT NOT REFUND MONEY please contact <a href='order-history.php'>customer support</a>";
	}
}

if (isset($_POST['handlereturn'])) {
	$order_id = (int)$_POST['order_id'];
	if (isset($_POST['return_check'])) {
		$ret = 1;
	} else {
		$ret = 0;
	}
	
	// Get order information
	$order_query = $conn->query("SELECT * FROM orders WHERE order_id = $order_id");
	if (!$order_query) echo "COULD NOT FETCH ORDER please contact <a href='order-history.php'>customer support</a>";

	$order = $order_query->fetch_array(MYSQLI_ASSOC);
	
	// Update product quantity
	$update_quantity_query = $conn->query("UPDATE product SET quantity = quantity + 1 WHERE prod_id = $order[prod_id]");
	if (!$update_quantity_query) echo "COULD NOT UPDATE QUANTITY please contact <a href='order-history.php'>customer support</a>";

	// Updated return_processed in returns
	$update_return_processed = $conn->query("UPDATE returns
												SET return_processed = $ret
												WHERE order_id = $order_id");
	if (!$update_return_processed) echo "COULD NOT UPDATE RETURN";

}

// Get all returns for all customers if employee/admin or just customer if customer
if (in_array('employee', $user_roles)) {
	$return_query = $conn->query("WITH all_users as (
									SELECT * FROM users
									UNION
								  	SELECT * FROM deactivated_accounts
								  )
  								  SELECT * 
								  FROM returns as r 
								  INNER JOIN orders as o 
								  ON r.order_id = o.order_id 
								  INNER JOIN all_users as u 
								  ON o.user_id = u.user_id
								  ORDER BY return_processed, date_returned DESC");
} else {
	$return_query = $conn->query("SELECT * 
								  FROM returns as r 
								  INNER JOIN orders as o 
								  ON r.order_id = o.order_id
								  INNER JOIN users as u 
								  ON o.user_id = u.user_id 
								  WHERE o.user_id = $user_id");
}

$rows = $return_query->num_rows;

// Create display of returns
for ($i=0; $i<$rows; ++$i) {
	$return_query->data_seek($i);
	$return = $return_query->fetch_array(MYSQLI_ASSOC);

	// Set display options based on return status
	if ($return['return_processed'] == 1) {
		$checked = "checked";
		$submit = "";
		$readonly = "readonly";
		$border = "border-success";
		$returned_tag = "<h5>Returned</h5>";
	} else {
		$checked = "";
		$submit = "<input type='submit' value='PROCESS RETURN'>";
		$readonly = "";
		$border = "border-danger";
		$returned_tag = "";
	}

	// If user is employee then give option to process return
	if (in_array('employee', $user_roles)) {
		$return_option = "
		<div class='col-4'>
			<form action='return.php' method='post'>
				<input type='hidden' name='order_id' value='$return[order_id]'>
				<label for='return_check'>Returned?</label>
				<input type='checkbox' name='return_check' value='1' $checked $readonly>
				<input type='hidden' name='handlereturn' value='yes'>
				$submit
			</form>
		</div>
		";
	} else {
		$return_option = "";
	}

	echo <<<_RETURN
	<div class="row mt-2 mb-2 border rounded $border">
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
						<p>Order Number: $return[order_id] $returned_tag</p>
					</div>
					$return_option
				</div>
			</div>
		</div>
	</div>
	_RETURN;
}

$conn->close();

require_once 'footer.html';

?>