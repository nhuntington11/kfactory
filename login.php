<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Kitten Factory - Login</title>
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="container">
		<a class="navbar-brand" href="index.php">Kitten Factory</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			<li class="nav-item">
			  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
			</li>
		  </ul>
		</div>
	  </div>
	</nav>
</header>

<main>
    <div class="container">
	<section class="vh-100">
	  <div class="container py-5 h-100">
		<div class="row d-flex align-items-center justify-content-center h-100">
		  <div class="col-md-8 col-lg-7 col-xl-6">
			<img src="img/login.svg" class="img-fluid" alt="login page">
		  </div>
		  <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
			<form>
			  <!-- Email input -->
			  <div class="form-outline mb-4">
				<input type="email" id="form1Example13" class="form-control form-control-lg" />
				<label class="form-label" for="form1Example13">Email address</label>
			  </div>

			  <!-- Password input -->
			  <div class="form-outline mb-4">
				<input type="password" id="form1Example23" class="form-control form-control-lg" />
				<label class="form-label" for="form1Example23">Password</label>
			  </div>

			  <!-- <div class="d-flex justify-content-around align-items-center mb-4">
				<div class="form-check">
				  <input
					class="form-check-input"
					type="checkbox"
					value=""
					id="rememberme"
					checked
				  />
				  <label class="form-check-label" for="rememberme"> Remember me </label>
				</div>
				<a href="#!">Forgot password?</a>
			  </div> -->

			  <!-- Submit button -->
			  <!-- <a href="index.php"><button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button></a> -->
			  <a class="btn btn-primary btn-lg btn-block" href="index.php" role="button">Log In</a>

			  <div class="divider d-flex align-items-center my-4">
				<p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
			  </div>

			  <a class="btn btn-primary btn-lg btn-block" style="background-color: #55acee" href="add-user.php" role="button">
				<i class="fab fa-twitter me-2"></i>Sign Up</a>

			</form>
		  </div>
		</div>
		</div>
	</section>   
    </div>
</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Kitten Factory &copy;</p>
  </div>
</footer>


    <script src="js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
