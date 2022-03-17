<?php

$page_roles = array('admin', 'employee', 'customer');

include_once 'check_session.php';
include_once 'header.html';
include_once 'dbinfo.php';

// Required to make My Account work
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
                        <a class="nav-link" href="return.php">Returns</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container">
    <div class="row">
        <div class="col">
            <h3>Orders</h3>
        </div>
    </div>
_NAV;

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die ($conn->connect_error);

// Check role and if employee/admin get all orders, if customer get customer orders
if (in_array('employee', $user_roles)) {
    $query = "SELECT * 
              FROM orders
              WHERE returned = 0 
              ORDER BY fulfilled ASC, purchase_date DESC";
} else {
    $query = "SELECT * 
              FROM orders 
              WHERE user_id = $user_id 
              ORDER BY fulfilled ASC, purchase_date DESC";
}

$result = $conn->query($query);
if (!$result) echo "ERROR IN DB CONNECTION";

$rows = $result->num_rows;

for ($i=0; $i<$rows; ++$i) {

    $result->data_seek($i);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    $order_id = $row['order_id'];
    $order_date = $row['purchase_date'];
    $product = $row['prod'];
    $prod_id = $row['prod_id'];
    $user_id_ = $row['user_id'];
    $fulfilled = $row['fulfilled'];
    $quantity = $row['quantity'];
    $returned = $row['returned'];

    $get_user = "SELECT * FROM users WHERE user_id = $user_id_";

    $user_result = $conn->query($get_user);
    if (!$user_result) echo "NO USER OF USERID $user_id";

    $user_row = $user_result->fetch_array(MYSQLI_ASSOC);

    $firstname = $user_row['firstname'];
    $lastname = $user_row['lastname'];

    if ($fulfilled) {
        $border = "border-success";
    } else {
        $border = "border-danger";
    }

    if ($returned) {
        $background = "bg-secondary";
        $border = "border-success";
        $return = "<h4>RETURNED</h4>";
        $return_option = "";
    } else {
        $background = "";
        $return = "";
        $return_option = "<form action='return.php' method='post'>
        <input type='hidden' name='order_id' value=$order_id>
        <input type='hidden' name='returned' value='yes'>
        <input type='submit' value='Return' class='btn btn-secondary btn-lg'>
        </form>";
    }

    echo <<<_ORDER
    <div class="row mt-2 mb-2 border rounded $border $background">
        <div class="col p-2">
            <div class="row">
                <div class="col-4">
                    <p>Order Date: $order_date</p>
                </div>
                <div class="col-4">
                    <p>Product: $product</p>
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
                    <form action="order-detail.php">
                        <input type="hidden" name="orderid" value="$order_id">
                        <input type="submit" value="Order Detail" class="btn btn-primary btn-lg">
                    </form>
                    $return_option
                </div>
            </div>
        </div>
    </div>
    _ORDER;
}

include_once 'footer.html';

?>