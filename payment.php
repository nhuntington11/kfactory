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
			  <a class="nav-link active" aria-current="page" href="#">Home</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="login.php">Log In</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="add-user.php">Sign Up</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="payment.php">Payment</a>
			</li>
		  </ul>
		  <form class="d-flex">
			<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success" type="submit">Search</button>
		  </form>
		</div>
	  </div>
	</nav>
</header>

<main>
    
    <div class="container">
	<section class="vh-100">
	<div class="container py-5 h-100">
	Cart contents goes here
		<form class="row g-3">
		  <div class="col-md-6">
			<label for="inputEmail4" class="form-label">Email</label>
			<input type="email" class="form-control" id="inputEmail4" placeholder="john.doe@gmail.com" >
		  </div>
		  <div class="col-md-6">
			<label for="inputPassword4" class="form-label">Password</label>
			<input type="password" class="form-control" id="inputPassword4">
		  </div>
		  <div class="col-12">
			<label for="inputAddress" class="form-label">Address</label>
			<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
		  </div>
		  <div class="col-12">
			<label for="inputAddress2" class="form-label">Address 2</label>
			<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
		  </div>
		  <div class="col-md-6">
			<label for="inputCity" class="form-label">City</label>
			<input type="text" class="form-control" id="inputCity"  placeholder="Salt Lake City">
		  </div>
		  <div class="col-md-4">
			<label for="inputState" class="form-label">State</label>
			<select id="inputState" class="form-select">
			  <option selected>Choose...</option>
			  <option>...</option>
			</select>
		  </div>
		  <div class="col-md-2">
			<label for="inputZip" class="form-label">Zip</label>
			<input type="text" class="form-control" id="inputZip"  placeholder="84123">
		  </div>
		  <div class="col-12">
			<button type="submit" class="btn btn-primary">Submit Order</button>
		  </div>
		   <div class="col-12">
			<button type="submit" class="btn btn-secondary">Cancel</button>
		  </div>
		</form>
    </section>
	</div>
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
