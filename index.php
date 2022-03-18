<?php

$page_roles = array('admin', 'employee', 'customer');

include_once 'check_session.php';
include_once 'header.html';
include_once 'dbinfo.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die ($conn->connect_error);

// Set page variables to current user
$firstname = $_SESSION['user']->firstname;
$user_id = $_SESSION['user']->user_id;

// Get amount on card for user
$amount_query = $conn->query("SELECT ROUND(SUM(amount),2) as total_amount FROM cust_payment_type WHERE user_id = $user_id");
if (!$amount_query) {
  $amount = "0.00";
}

$row = $amount_query->fetch_array(MYSQLI_ASSOC);
$amount = $row['total_amount'];

if (is_null($amount)) {
  $amount = 0.00;
}

// Navbar options
echo <<<_NAV
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Kitten Factory</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="update-user.php?user_id=$user_id">My Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="order-history.php">Order History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin.php">Admininstrator</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<body>
  <div class="album py-5 bg-light">
    <div class="wrapper">
      <div class="container">
        <div class="row m-3">
          <div class="col">
            <h3>Hello, $firstname! You have $amount to spend!</h3>
          </div>
          </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
_NAV;

// Product display
$query = "SELECT prod_id, prod_name, description, price, img_path, quantity FROM product";

$result = $conn->query($query);
if (!$result) echo "ERROR";

$rows = $result->num_rows;

for ($i=0; $i<$rows; ++$i) {
  $result->data_seek($i);
  $ski = $result->fetch_array(MYSQLI_ASSOC);

  echo <<<_SKI
  <div class="col">
    <div class="card shadow-sm">
      <img class="bd-placeholder-img card-img-top" src="$ski[img_path]">
      <div class="card-body">
        <p class="card-text">$ski[description]</p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <form action="payment.php" method="post">
              <input type="hidden" name="prod_id" value="$ski[prod_id]">
              <input type="hidden" name="prod_name" value="$ski[prod_name]">
              <input type="hidden" name="price" value="$ski[price]">
              <input type="hidden" name="img_path" value="$ski[img_path]">
              <button type="submit" class="btn btn-sm btn-outline-secondary">Add to cart</button></a>
            </form>
          </div>
          <small class="text-muted">Price: $ski[price]</small>
          <small class="text-muted">Quantity: $ski[quantity]</small>
        </div>
      </div>
    </div>
  </div>
  _SKI;
}

echo <<<_END
</div>
</div>
</div>
_END;

include_once 'footer.html';

?>