<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Kitten Factory - Order Detail</title>
	
    <!-- Bootstrap core CSS -->
		<link href="css/style.css" rel="stylesheet">
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
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add-user.php">My Account</a>
                        </li>
                    </ul>
                </div>
            </div>
            </nav>
        </header>
		
		<div class="container">
				<div class="row">
					<div class="col">
						<h3>Unfulfilled Orders</h3>
					</div>
				</div>
				<div class="row mt-2 mb-2 border border-danger">
					<div class="col p-2">
						<div class="row">
							<div class="col-4">
								<p>Order Date: 2/02/2022</p>
							</div>
							<div class="col-4">
								<p>Product: Atomic Skis</p>
							</div>
							<div class="col-4">
								<p>Shipped To: Nick Huntington</p>
							</div>
						</div>
						<div class="row">
							<div class="col-8">
								<p>Description: 1 pair Atomic Skis ordered</p>
							</div>
							<div class="col">
								<form action="order-history.php">
									<input type="hidden" name="orderid" value="1">
									<input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
									<label class="btn btn-outline-primary" for="btn-checked-outline">Fulfilled?</label>
								</form>
                            </div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-2 mb-2 border border-danger">
					<div class="col p-2">
						<div class="row">
							<div class="col-4">
								<p>Order Date: 1/10/2022</p>
							</div>
							<div class="col-4">
								<p>Product: Salmon Skis</p>
							</div>
							<div class="col-4">
								<p>Shipped To: Lindsay Fielden</p>
							</div>
						</div>
						<div class="row">
							<div class="col-8">
								<p>Description: 1 pair Salmon Skis ordered</p>
							</div>
							<div class="col">
								<form action="order-history.php">
									<input type="hidden" name="orderid" value="2">
									<input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
									<label class="btn btn-outline-primary" for="btn-checked-outline">Fulfilled?</label>
								</form>
                            </div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-2 mb-2 border border-danger">
					<div class="col p-2">
						<div class="row">
							<div class="col-4">
								<p>Order Date: 1/22/2022</p>
							</div>
							<div class="col-4">
								<p>Product: DPS Skis</p>
							</div>
							<div class="col-4">
								<p>Shipped To: Jane Forester</p>
							</div>
						</div>
						<div class="row">
							<div class="col-8">
								<p>Description: 1 pair DPS Skis ordered</p>
							</div>
							<div class="col">
								<form action="order-history.php">
									<input type="hidden" name="orderid" value="3">
									<input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
									<label class="btn btn-outline-primary" for="btn-checked-outline">Fulfilled?</label>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="text-muted py-5">
            <div class="container">
                <p class="float-end mb-1">
                    <a href="#">Back to top</a>
                </p>
            <p class="mb-1">Kitten Factory &copy;</p>
            </div>
        </footer>
    </body>
</html>