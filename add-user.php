<?php

$page_roles = array('admin', 'employee');

include_once 'check_session.php';
include_once 'header.html';
include_once 'dbinfo.php';

if (isset($_POST['email'])) {
	$conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error) die ($conn->connect_error);

	$email = $_POST['email'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	// $emails = "SELECT email FROM users";
	// $email_result = $conn->query($emails);
	// if (!$email_result) echo "ERROR";
	// $used_emails = $email_result->fetch_array(MYSQLI_BOTH);
	// print_r($used_emails);
	
	// for ($i=0; $i<count($used_emails); ++$i) {
	// 	if ($email == $used_emails[$i]) {
	// 		header('Location: admin.php');
	// 	}
	// }

	$add_user = "INSERT INTO users (firstname, lastname, email, address1, address2, city, zip, state, password) VALUES ('$firstname', '$lastname', '$email', '$address1', '$address2', '$city', '$zip', '$state', '$password')";
	$result_add_user = $conn->query($add_user);
	if (!$result_add_user) echo "ERROR2";

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
				<div class="row d-flex align-items-center justify-content-center h-100">
					<div class="col-md-8 col-lg-7 col-xl-6">
						<img src="img/login.svg" class="img-fluid" alt="sign up page">
					</div>
					<div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
						<form action="add-user.php" method="post">
						<div class="form-row">
							<div class="row g-3">
							<div class="col">
								<label for="firstname">First Name</label>
								<input type="text" class="form-control" name="firstname" placeholder="Firstname" aria-label="First name">
							</div>
							<div class="col">
								<label for="lastname">Last Name</label>
								<input type="text" class="form-control" name="lastname" placeholder="Lastname" aria-label="Last name">
							</div>
							</div>
							<div class="form-group col-md-6">
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" placeholder="Email" required>
							</div>
							<div class="form-group col-md-6">
							<label for="password">Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
						</div>
						<div class="form-group">
							<label for="address1">Address</label>
							<input type="text" class="form-control" name="address1" placeholder="1234 Main St">
						</div>
						<div class="form-group">
							<label for="address2">Address 2</label>
							<input type="text" class="form-control" name="address2" placeholder="Apartment, studio, or floor">
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
							<label for="city">City</label>
							<input type="text" class="form-control" name="city">
							</div>
							<div class="form-group col-md-4">
							<label for="state">State</label>
							<select name="state" class="form-control">
								<option>UT</option>
							</select>
							</div>
							<div class="form-group col-md-2">
							<label for="zip">Zip</label>
							<input type="text" class="form-control" name="zip">
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Sign Up</button>
						</form>
					</div>
				</div>
			</div>
		</section>   
	</div>
</body>

_NAV;

include_once 'footer.html';

?>