<?php

$page_roles = array('admin', 'employee', 'customer');


require_once 'check_session.php';
require_once 'header.html';
require_once 'dbinfo.php';
require_once 'User.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['user_id'])) {	
	$user_id = $_GET['user_id'];

	$query = "SELECT * FROM users WHERE user_id = $user_id";
	$result = $conn->query($query);
	if(!$result) die($conn->error);

	$rows = $result->num_rows;

	for($j=0; $j<$rows; $j++)
	{
		$row = $result->fetch_array(MYSQLI_ASSOC); 
		

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
								<a class="nav-link" href="logout.php">Logout</a>
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
						<div class="row d-flex align-items-center justify-content-center h-100">
							<div class="col-md-8 col-lg-7 col-xl-6">
								<div class="row">
									<div class="col align-items-center justify-content-center">
										<img src="$row[profile_pic]" class="img-fluid" width="250" alt="sign up page">
									</div>
								</div>
								<div class="row">
									<div class="col">
										<form action="update-user.php" method="post">
											<input type="hidden" name="add_cc" value="addcc">
											<input type="hidden" name="userid" value="$row[user_id]">
											<div class="form-row">
												<label for="ccnumber">Card Number</label>
												<input type="number" name="ccnumber" placeholder="Card Number">
											</div>
											<div class="form-row">
												<label for="expdate">Expiration Date</label>
												<input type="date" name="expdate">
											</div>
											<div class="form-row">
												<label for="ccv">CCV</label>
												<input type="number" name="ccv" placeholder="CCV">
											</div>
											<input type="submit" value="Add Card">
										</form>
									</div>
								</div>
							</div>
							<div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
								<form action="update-user.php" method="post">
									<div class="form-row">
										<div class="row g-3">
											<div class="col">
												<label for="firstname">First Name</label>
												<input type="text" class="form-control" name="firstname" value="$row[firstname]" aria-label="First name">
											</div>
											<div class="col">
												<label for="lastname">Last Name</label>
												<input type="text" class="form-control" name="lastname" value="$row[lastname]" aria-label="Last name">
											</div>
										</div>
										<div class="form-group col-md-6">
										<label for="email">Email</label>
										<input type="email" class="form-control" name="email" value="$row[email]" required>
										</div>
										<div class="form-group col-md-6">
										<label for="password">Password</label>
										<input type="password" class="form-control" name="password" value="$row[password]" required>
										</div>
									</div>
									<div class="form-group">
										<label for="address1">Address</label>
										<input type="text" class="form-control" name="address1" value="$row[address1]">
									</div>
									<div class="form-group">
										<label for="address2">Address 2</label>
										<input type="text" class="form-control" name="address2" value="$row[address2]">
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
										<label for="city">City</label>
										<input type="text" class="form-control" name="city" value="$row[city]">
										</div>
										<div class="form-group col-md-4">
										<label for="state">State</label>
										<select name="state" class="form-control">
											<option>UT</option>
										</select>
										</div>
										<div class="form-group col-md-2">
										<label for="zip">Zip</label>
										<input type="text" class="form-control" name="zip" value="$row[zip]">
										</div>
									</div>
									<input type="hidden" name="userid" value="$row[user_id]">
									<input type="hidden" name="update_user" value="update_user">
									<button type="submit" class="btn btn-primary">Update</button>
								</form>
							</div>
						</div>
					</div>
				</section>   
			</div>
		</body>
		_NAV;
	}
}


if (isset($_POST['update_user'])) {
    $user_id = $_POST['userid'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$city = $_POST['city'];
	$zip = $_POST['zip'];
	$state = $_POST['state'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	
	$update_user = "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email', address1='$address1', address2='$address2', city='$city', state='$state', zip='$zip', password='$password' WHERE user_id = $user_id";
    $result = $conn->query($update_user); 
	if (!$result) echo "ERROR2";

	if ($_SESSION['user']->email == $email) {
		$_SESSION['user'] = new User($email);
	}

	if (in_array('employee', $user_roles)) {
		header('Location: admin.php');
	} else {
		header('Location: index.php');
	}
}

if (isset($_POST['add_cc'])) {
	$user_id = $_POST['userid'];
	$ccnum = $_POST['ccnumber'];
	$expdate = $_POST['expdate'];
	$ccv = $_POST['ccv'];

	$cc_query = $conn->query("INSERT INTO cust_payment_type (user_id, cc_num, exp_date, ccv) VALUES ($user_id, '$ccnum', '$expdate', $ccv)");
	if (!$cc_query) echo "COULD NOT ADD CARD <a href='update-user.php?user_id=$user_id'>try again</a>";

	header("Location: update-user.php?user_id=$user_id");
}

$conn->close();

include_once 'footer.html';

?>
