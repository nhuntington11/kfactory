<?php

$page_roles = array('admin', 'employee');

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
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Admininstrator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="order-history.php">Order History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="return.php">Returns</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add-user.php">Add User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="prodmat-detail.php">Update Product or Material</a>
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
    <div class="row m-4 p-4 border-bottom border-primary">
        <div class="col-6">
        <h4>Sales Report</h4>
            <form action="admin.php" method="post">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control">
            <label for="end_date" class="form-label">Start Date</label>
            <input type="date" name="end_date" class="form-control">
            <input type="hidden" name="salesreport" value="yes">
            <input type="submit" value="Generate Sales Report" class="btn btn-primary btn-lg m-2">
            </form>
        </div>
        <div class="col-6">
        <h4>Product Report</h4>
            <form action="admin.php" method="post">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control">
            <label for="end_date" class="form-label">Start Date</label>
            <input type="date" name="end_date" class="form-control">
            <input type="hidden" name="productreport" value="yes">
            <input type="submit" value="Generate Product Report" class="btn btn-primary btn-lg m-2">
            </form>
        </div>
    </div>
_NAV;

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die ($conn->connect_error);

if (isset($_POST['delete'])) {
    $user_id = $_POST['id'];

    $user_query = $conn->query("SELECT * FROM users WHERE user_id = $user_id");
    if (!$user_query) echo "COULD NOT FETCH USER";

    $user = $user_query->fetch_array(MYSQLI_ASSOC);

    $deactivate_query = $conn->query("INSERT INTO deactivated_accounts (user_id, firstname, lastname, username, address1, address2, city, zip, state, password) 
                                      VALUES ($user_id, '$user[firstname]', '$user[lastname]', '$user[username]', '$user[address1]', '$user[address2]', '$user[city]', '$user[zip]', '$user[state]', '$user[password]')");
    
    $remove_roles_query = $conn->query("DELETE FROM roles WHERE user_id = $user_id");
    if (!$remove_roles_query) echo "COULD NOT UPDATE ROLES";

    $remove_payment_query = $conn->query("DELETE FROM cust_payment_type WHERE user_id = $user_id");
    if (!$remove_payment_query) echo "COULD NOT DELETE PAYMENT CARD";

    $delete_query = $conn->query("DELETE FROM users WHERE user_id = $user_id");
    if (!$delete_query) echo "CANNOT DELETE USER <a href='admin.php'>go home</a>";

    header('Location: admin.php');
}

// Update role form - admin
if (isset($_POST['update_role_admin'])) {
    $user_id = $_POST['user_id'];
    $action = $_POST['update_role_admin'];

    if ($action == 'Add') {
        $add_query = $conn->query("INSERT INTO roles (user_id, role) VALUES ($user_id, 'admin')");
    } elseif ($action == 'Remove') {
        $remove_query = $conn->query("DELETE FROM roles WHERE user_id = $user_id AND role = 'admin'");
    }
}

// Update role form - employee
if (isset($_POST['update_role_employee'])) {
    $user_id = $_POST['user_id'];
    $action = $_POST['update_role_employee'];

    if ($action == 'Add') {
        $add_query = $conn->query("INSERT INTO roles (user_id, role) VALUES ($user_id, 'employee')");
    } elseif ($action == 'Remove') {
        $remove_query = $conn->query("DELETE FROM roles WHERE user_id = $user_id AND role = 'employee'");
    }
}

// Update role form - customer
if (isset($_POST['update_role_customer'])) {
    $user_id = $_POST['user_id'];
    $action = $_POST['update_role_customer'];

    if ($action == 'Add') {
        $add_query = $conn->query("INSERT INTO roles (user_id, role) VALUES ($user_id, 'customer')");
    } elseif ($action == 'Remove') {
        $remove_query = $conn->query("DELETE FROM roles WHERE user_id = $user_id AND role = 'customer'");
    }
}

// If report is selected generate report
if (isset($_POST['salesreport'])) {
    $startdate = $_POST['start_date'];
    $enddate = $_POST['end_date'];

    $sales_query = $conn->query("SELECT prod_id, prod, count(*) as total, ROUND(SUM(total_price),2) as gross 
                                 FROM orders 
                                 WHERE purchase_date BETWEEN '$startdate' AND '$enddate' 
                                 GROUP BY prod_id 
                                 ORDER BY gross DESC");
    if (!$sales_query) echo "COULD NOT GENERATE SALES REPORT";

    $rows = $sales_query->num_rows;

    echo <<<_REPORT
    <div class="row">
        <div class="col">
            <h2>SALES REPORT</h2>
        </div>
        <div class="col">
            <h4>Start Date: $startdate</h4>
        </div>
        <div class="col">
            <h4>End Date: $enddate</h4>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Amount Sold</th>
                    <th>Revenue</th>
                </thead>
                <tbody>
    _REPORT;

    for ($i=0; $i<$rows; ++$i) {
        $sales_query->data_seek($i);
        $report_row = $sales_query->fetch_array(MYSQLI_ASSOC);

        echo <<<_TBODY
        <tr>
            <td>$report_row[prod_id]</td>
            <td>$report_row[prod]</td>
            <td>$report_row[total]</td>
            <td>$report_row[gross]</td>
        </tr>
        _TBODY;
    }

    echo <<<_TEND
        </tbody>
    </table>
    </div>
    </div>
    _TEND;
} elseif (isset($_POST['productreport'])) {
    $startdate = $_POST['start_date'];
    $enddate = $_POST['end_date'];

    $sales_query = $conn->query("SELECT prod_id, prod, count(*) as total
                                 FROM orders 
                                 WHERE purchase_date BETWEEN '$startdate' AND '$enddate' 
                                 GROUP BY prod_id 
                                 ORDER BY total DESC");
    if (!$sales_query) echo "COULD NOT GENERATE SALES REPORT";

    $rows = $sales_query->num_rows;

    echo <<<_REPORT
    <div class="row">
        <div class="col">
            <h2>PRODUCT REPORT</h2>
        </div>
        <div class="col">
            <h2>PRODUCT REPORT</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4>Start Date: $startdate</h4>
        </div>
        <div class="col">
            <h4>End Date: $enddate</h4>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Amount Sold</th>
                </thead>
                <tbody>
    _REPORT;

    for ($i=0; $i<$rows; ++$i) {
        $sales_query->data_seek($i);
        $report_row = $sales_query->fetch_array(MYSQLI_ASSOC);

        echo <<<_TBODY
        <tr>
            <td>$report_row[prod_id]</td>
            <td>$report_row[prod]</td>
            <td>$report_row[total]</td>
        </tr>
        _TBODY;
    }

    echo <<<_TEND
        </tbody>
    </table>
    </div>
    </div>
    _TEND; 
} else {
// If no report is selected then show all users
    $query = "SELECT * FROM users";
    $result = $conn->query($query);

    if (!$result) echo "ERROR CONNECTING TO DB";
    else {
        $rows = $result->num_rows;

        for ($i=0; $i<$rows; ++$i) {
            $result->data_seek($i);
            $user_card = $result->fetch_array(MYSQLI_ASSOC);

            $firstname = $user_card['firstname'];
            $lastname = $user_card['lastname'];
            $id = $user_card['user_id'];
            $profile_pic = "img/smiley.jpg";

            // Get roles
            $roles_query = $conn->query("SELECT role FROM roles WHERE user_id = $id");
            if (!$roles_query) echo "COULD NOT GET ROLES";
            $role_rows = $roles_query->num_rows;
            $display_roles = array();
            for ($j=0; $j<$role_rows; ++$j) {
               $row = $roles_query->data_seek($j);
               $role = $roles_query->fetch_array(MYSQLI_ASSOC);
               $display_roles[] = $role['role'];
            }

            // Admin role form
            if (in_array('admin', $display_roles)) {
                $admin_value = 'Remove';
                $granted = 'yes';
            } else {
                $admin_value = 'Add';
                $granted = 'no';
            }

            $admin_role = "
            <form action='admin.php' method='post'>
            <p>Admin - $granted</p>
            <input type='hidden' name='user_id' value='$id'>
            <input type='hidden' name='update_role_admin' value='$admin_value'>
            <input class='btn btn-primary' type='submit' value='$admin_value'>
            </form>
            ";
            
            // Employee role form
            if (in_array('employee', $display_roles)) {
                $employee_value = 'Remove';
                $granted = 'yes';
            } else {
                $employee_value = 'Add';
                $granted = 'no';
            }

            $employee_role = "
            <form action='admin.php' method='post'>
            <p>Employee - $granted</p>
            <input type='hidden' name='user_id' value='$id'>
            <input type='hidden' name='update_role_employee' value='$employee_value'>
            <input class='btn btn-primary' type='submit' value='$employee_value'>
            </form>
            ";

            // Customer role form
            if (in_array('customer', $display_roles)) {
                $customer_value = 'Remove';
                $granted = 'yes';
            } else {
                $customer_value = 'Add';
                $granted = 'no';
            }

            $customer_role = "
            <form action='admin.php' method='post'>
            <p>Customer - $granted</p>
            <input type='hidden' name='user_id' value='$id'>
            <input type='hidden' name='update_role_customer' value='$customer_value'>
            <input class='btn btn-primary' type='submit' value='$customer_value'>
            </form>
            ";

            // Only show delete for admin employees
            if (in_array('admin', $user_roles)) {
                $delete_user = "
                <div class='row m-2'>
                    <div class='col'>
                        <form action='admin.php' method='post'>
                            <input type='hidden' name='id' value='$id'>
                            <input type='hidden' name='delete' value='delete'>
                            <input class='btn btn-danger btn-lg btn-block' type='submit' value='Delete User'>
                        </form>
                    </div>
                </div>";
            } else {
                $delete_user = "";
            }

            echo <<<_USER
                <div class="row m-2 mb-4 border border-primary">
                    <div class="col-md-3">
                        <img src="$profile_pic" alt="profile_pic.png" width="200px" height="200px">
                    </div>
                    <div class="col-md-6">
                        <div class="row m-2">
                            <div class="col">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" name="firstname" value="$firstname" readonly>
                            </div>
                            <div class="col">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" name="lastname" value="$lastname" readonly>
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col">
                                <label for="idnumber">Id Number</label>
                                <input type="text" class="form-control" name="idnumber" value="$id" readonly>
                            </div>
                            <div class="col">
                                $admin_role
                            </div>
                            <div class="col">
                                $employee_role
                            </div>
                            <div class="col">
                                $customer_role
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <form action="update-user.php?user_id=$id" method="post">
                            <div class="row m-2">
                                <div class="col">
                                    <input type="hidden" name="id" value="$id">
                                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Details">
                                </div>
                            </div>
                        </form>
                        $delete_user
                    </div>
                </div>
            _USER;
        }
    }
}
include_once 'footer.html';
?>
