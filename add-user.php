<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Kitten Factory - Sign up</title>
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
			<img src="img/login.svg" class="img-fluid" alt="sign up page">
		  </div>
		  <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
			<form action="index.php">
			  <div class="form-row">
			    <div class="row g-3">
				  <div class="col">
				     <label for="firstname">First Name</label>
					<input type="text" class="form-control" placeholder="Firstname" aria-label="First name">
				  </div>
				  <div class="col">
				     <label for="lastname">Last Name</label>
					<input type="text" class="form-control" placeholder="Lastname" aria-label="Last name">
				  </div>
				</div>
				<div class="form-group col-md-6">
				  <label for="inputEmail4">Email</label>
				  <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
				</div>
				<div class="form-group col-md-6">
				  <label for="inputPassword4">Password</label>
				  <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputAddress">Address</label>
				<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
			  </div>
			  <div class="form-group">
				<label for="inputAddress2">Address 2</label>
				<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
			  </div>
			  <div class="form-row">
				<div class="form-group col-md-6">
				  <label for="inputCity">City</label>
				  <input type="text" class="form-control" id="inputCity">
				</div>
				<div class="form-group col-md-4">
				  <label for="inputState">State</label>
				  <select id="inputState" class="form-control">
					<option selected>Choose...</option>
					<option>...</option>
				  </select>
				</div>
				<div class="form-group col-md-2">
				  <label for="inputZip">Zip</label>
				  <input type="text" class="form-control" id="inputZip">
				</div>
			  </div>
			  <div class="form-group">
				<div class="form-check">
				  <input class="form-check-input" type="checkbox" id="gridCheck">
				  <label class="form-check-label" for="gridCheck">
					Check me out
				  </label>
				</div>
			  </div>
			  <button type="submit" class="btn btn-primary">Sign Up</button>
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
