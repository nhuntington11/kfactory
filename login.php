<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel='stylesheet' href='stylesheet.css'>
	<title>Login</title>
</head>
<body>
	<div class='mt-4 p-5 bg-secondary text-body rounded'>	
		<div class='container-fluid'>
			<nav class='navbar navbar-default'>
				<div class='navbar-header'>
					<a class='navbar-brand logo' href='home.php'>Kitten Factory</a>
				</div>
			</nav>
		</div>
	</div>
	<div class='container'>
		<div class="row justify-content-center">
			<div class="col-4">
				<div class="row text-center mt-5 mb-5">
					<h1>Login</h1>
				</div>
				<form action="home.php" method='post'>
					<div class="mb-3 mt-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" class="form-control" placeholder="Email" name="email">
					</div>
					<div class="mb-3 mt-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" class="form-control" placeholder="Password" name="password">
					</div>
					<div class="mb-3 mt-3">
						<input type='submit' class="form-control" value="Log In">
					</div>
				</form>
				<div class="row">
					<div class="col text-center mt-3">
						<a href='#'>Create Account</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>