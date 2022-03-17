<?php

require_once 'header.html';
require_once 'dbinfo.php';
require_once 'User.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die ($conn->connect_error);

if (isset($_POST['username']) && isset($_POST['password'])) {
	$tmp_username = $_POST['username'];
	$tmp_password = $_POST['password'];

	$query = "SELECT password FROM users WHERE username = '$tmp_username'";

	$result = $conn->query($query);
	if (!$result) echo "DB ERROR";
	
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$passwordFromDB = $row['password'];

	if (password_verify($tmp_password, $passwordFromDB)) {
		$user = new User($tmp_username);

		session_start();
		$_SESSION['user'] = $user;

		header('Location: index.php');
	} else {
		header('Location: login.php');
	}
}

echo <<<_NAV
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="login.php">Kitten Factory</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
		</div>
	</nav>
</header>

<body>
	<div class="container">
		<section class="vh-100">
			<div class="container py-5 h-100">
				<div class="row d-flex align-items-center justify-content-center h-100">
					<div class="col-md-8 col-lg-7 col-xl-6">
						<img src="img/login.svg" class="img-fluid" alt="login page">
					</div>
					<div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
						<form action="login.php" method="post">
						<div class="form-outline mb-4">
							<input type="text" name="username" class="form-control form-control-lg" required>
							<label class="form-label" for="username">Username</label>
						</div>
						<div class="form-outline mb-4">
							<input type="password" name="password" class="form-control form-control-lg" required>
							<label class="form-label" for="password">Password</label>
						</div>
						<button class="btn btn-primary btn-lg btn-block" type="submit">Log In</a>
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


