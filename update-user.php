<?php

$page_roles = array('admin', 'employee', 'customer');


include_once 'check_session.php';
include_once 'header.html';
include_once 'dbinfo.php';

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
								<img src="$row[profile_pic]" class="img-fluid" alt="sign up page">
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


if (isset($_POST['userid'])) {
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
	
	if (in_array('employee', $page_roles)) {
		header('Location: admin.php');
	} else {
		header('Location: index.php');
	}
}

$conn->close();
include_once 'footer.html';

?>
