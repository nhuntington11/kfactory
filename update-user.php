<?php

$page_roles = array('admin', 'employee', 'customer');

include_once 'check_session.php';
include_once 'header.html';
include_once 'dbinfo.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die ($conn->connect_error);

$user_id = $_POST['id'];

$query = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = $conn->query($query);

$row = $result->fetch_array(MYSQLI_ASSOC);

$firstname = $row['firstname'];
$lastname = $row['lastname'];
$email = $row['email'];
$address1 = $row['address1'];
$address2 = $row['address2'];
$city = $row['city'];
$state = $row['state'];
$zip = $row['zip'];

if (isset($_POST['inputEmail4'])) {
    $user_id = $_POST['id'];
	$email = $_POST['inputEmail4'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$address1 = $_POST['inputAddress'];
	$address2 = $_POST['inputAddress2'];
	$city = $_POST['inputCity'];
	$state = $_POST['inputState'];
	$zip = $_POST['inputZip'];
	//$password = password_hash($_POST['inputPassword4'], PASSWORD_DEFAULT);

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
//, lastname = '$lastname', email = '$email', address1 = '$address1', address2 = '$address2', city = '$city', zip = '$zip', state = '$state' 
	$update_user = "UPDATE users SET firstname='$firstname' WHERE user_id = $user_id";
    $result_update_user = $conn->query($update_user);
	if (!$result_update_user) echo "ERROR2";

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
								<input type="text" class="form-control" name="firstname" value="$firstname" aria-label="First name">
							</div>
							<div class="col">
								<label for="lastname">Last Name</label>
								<input type="text" class="form-control" name="lastname" value="$lastname" aria-label="Last name">
							</div>
							</div>
							<div class="form-group col-md-6">
							<label for="inputEmail4">Email</label>
							<input type="email" class="form-control" name="inputEmail4" value=$email required>
							</div>
							<div class="form-group col-md-6">
							<label for="inputPassword4">Password</label>
							<input type="password" class="form-control" name="inputPassword4">
							</div>
						</div>
						<div class="form-group">
							<label for="inputAddress">Address</label>
							<input type="text" class="form-control" name="inputAddress" value="$address1">
						</div>
						<div class="form-group">
							<label for="inputAddress2">Address 2</label>
							<input type="text" class="form-control" name="inputAddress2" value="$address2">
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
							<label for="inputCity">City</label>
							<input type="text" class="form-control" name="inputCity" value="$city">
							</div>
							<div class="form-group col-md-4">
							<label for="inputState">State</label>
							<select name="inputState" class="form-control">
								<option>UT</option>
							</select>
							</div>
							<div class="form-group col-md-2">
							<label for="inputZip">Zip</label>
							<input type="text" class="form-control" name="inputZip" value="$zip">
							</div>
						</div>
                        <input type="hidden" name="id" value="$user_id">
						<button type="submit" class="btn btn-primary">Update</button>
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