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
            <form action="admin.php">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control">
            <label for="end_date" class="form-label">Start Date</label>
            <input type="date" name="end_date" class="form-control">
            <input type="submit" value="Generate Sales Report" class="btn btn-primary btn-lg m-2">
            </form>
        </div>
        <div class="col-6">
        <h4>Product Report</h4>
            <form action="admin.php">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control">
            <label for="end_date" class="form-label">Start Date</label>
            <input type="date" name="end_date" class="form-control">
            <input type="submit" value="Generate Product Report" class="btn btn-primary btn-lg m-2">
            </form>
        </div>
    </div>
_NAV;

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die ($conn->connect_error);

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

        echo <<<_USER
        <form action="admin.php" method="post">
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
                            <label for="role">Role</label>
                            <select class="form-control" name="role" id="userrole">
                                <option>Customer</option>
                                <option>Employee</option>
                                <option>Admininstrator</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row m-2">
                        <div class="col">
                            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Update Roles">
                        </div>
                    </div>
                    </form>
                    <form action="update-user.php?user_id=$id" method="post">
                        <div class="row m-2">
                            <div class="col">
                                <input type="hidden" name="id" value="$id">
                                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Details">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        _USER;
    }
}

include_once 'footer.html';

?>