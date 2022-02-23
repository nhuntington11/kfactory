<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel='stylesheet' href='stylesheet.css'>
	<title>Document</title>
</head>

<body>
	<div class='mt-4 p-5 bg-secondary text-body rounded'>	
		<div class='container-fluid'>
			<nav class='navbar navbar-default'>
				<div class='navbar-header'>
					<a class='navbar-brand logo' href='home.php'>Kitten Factory</a>
				</div>
				<ul class='nav navbar-nav'>
					<li class='active'><a href='login.php' class='text-body'>Login or Sign Up</a></li>
				</ul>
			</nav>
		</div>
	</div>

	<div class='container-fluid'>
		<div class="row m-5">
			<div class="col-md-4 p-2">
				<div class='row'>
					<img src='images/atomic.png' class='img-fluid'>
				</div>
				<div class='row'>	
					<p class='mt-4'>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum venenatis enim vel eleifend faucibus. Nullam sed lacus a ante imperdiet lacinia quis vel orci. Donec gravida nibh at turpis pretium, eget finibus lorem pharetra. Maecenas ac libero convallis, feugiat est eget, lacinia mauris. Vestibulum ac mauris congue, feugiat mauris ac, lobortis lorem. Vivamus quis dolor at massa dapibus accumsan id eu ex. Mauris sagittis volutpat orci id aliquet. Curabitur sollicitudin lectus odio, id porta ante finibus sed. Nam feugiat congue sodales. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi. Fusce quis metus cursus, mollis magna vel, porta augue. Vivamus a aliquam mi. Sed eros elit, suscipit vel convallis eu, aliquam ut justo. Phasellus id dolor pretium, molestie nulla in, tincidunt metus. Ut placerat lorem vitae lacus volutpat, malesuada hendrerit erat pretium. 
					</p>
				</div>
				<div class="row">
					<div class="col text-center">
						<h3>700.00</h3>
					</div>
				</div>
				<form action='payment.php' method='post'>
					<div class='row align-items-center justify-content-center'>
						<div class='col-3 text-center'>
							<label for='quantity' class='form-label'>Quantity</label>
							<input type='number' class='form-control' id='quantity' name='atomic-quantity' placeholder='Qty' min='0' max='10' step='1'>
						</div>
						<div class='col-3 text-center'>
							<input type='image' src='images/cart.svg' alt='submit' height='30' width='30px'>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-4 p-2">
				<div class='row'>
					<img src='images/dps.png' class='img-fluid'>
				</div>
				<div class='row'>	
					<p class='mt-4'>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum venenatis enim vel eleifend faucibus. Nullam sed lacus a ante imperdiet lacinia quis vel orci. Donec gravida nibh at turpis pretium, eget finibus lorem pharetra. Maecenas ac libero convallis, feugiat est eget, lacinia mauris. Vestibulum ac mauris congue, feugiat mauris ac, lobortis lorem. Vivamus quis dolor at massa dapibus accumsan id eu ex. Mauris sagittis volutpat orci id aliquet. Curabitur sollicitudin lectus odio, id porta ante finibus sed. Nam feugiat congue sodales. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi. Fusce quis metus cursus, mollis magna vel, porta augue. Vivamus a aliquam mi. Sed eros elit, suscipit vel convallis eu, aliquam ut justo. Phasellus id dolor pretium, molestie nulla in, tincidunt metus. Ut placerat lorem vitae lacus volutpat, malesuada hendrerit erat pretium. 
					</p>
				</div>
				<div class="row">
					<div class="col text-center">
						<h3>600.00</h3>
					</div>
				</div>
				<form action='payment.php' method='post'>
					<div class='row align-items-center justify-content-center'>
						<div class='col-3 text-center'>
							<label for='quantity' class='form-label'>Quantity</label>
							<input type='number' class='form-control' id='quantity' name='atomic-quantity' placeholder='Qty' min='0' max='10' step='1'>
						</div>
						<div class='col-3 text-center'>
							<input type='image' src='images/cart.svg' alt='submit' height='30' width='30px'>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-4 p-2">
				<div class='row'>
					<img src='images/kastle.png' class='img-fluid'>
				</div>
				<div class='row'>	
					<p class='mt-4'>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum venenatis enim vel eleifend faucibus. Nullam sed lacus a ante imperdiet lacinia quis vel orci. Donec gravida nibh at turpis pretium, eget finibus lorem pharetra. Maecenas ac libero convallis, feugiat est eget, lacinia mauris. Vestibulum ac mauris congue, feugiat mauris ac, lobortis lorem. Vivamus quis dolor at massa dapibus accumsan id eu ex. Mauris sagittis volutpat orci id aliquet. Curabitur sollicitudin lectus odio, id porta ante finibus sed. Nam feugiat congue sodales. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi. Fusce quis metus cursus, mollis magna vel, porta augue. Vivamus a aliquam mi. Sed eros elit, suscipit vel convallis eu, aliquam ut justo. Phasellus id dolor pretium, molestie nulla in, tincidunt metus. Ut placerat lorem vitae lacus volutpat, malesuada hendrerit erat pretium. 
					</p>
				</div>
				<div class="row">
					<div class="col text-center">
						<h3>400.00</h3>
					</div>
				</div>
				<form action='payment.php' method='post'>
					<div class='row align-items-center justify-content-center'>
						<div class='col-3 text-center'>
							<label for='quantity' class='form-label'>Quantity</label>
							<input type='number' class='form-control' id='quantity' name='atomic-quantity' placeholder='Qty' min='0' max='10' step='1'>
						</div>
						<div class='col-3 text-center'>
							<input type='image' src='images/cart.svg' alt='submit' height='30' width='30px'>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="row m-5">
			<div class="col-md-4 p-2">
				<div class='row'>
					<img src='images/salomon.png' class='img-fluid'>
				</div>
				<div class='row'>	
					<p class='mt-4'>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum venenatis enim vel eleifend faucibus. Nullam sed lacus a ante imperdiet lacinia quis vel orci. Donec gravida nibh at turpis pretium, eget finibus lorem pharetra. Maecenas ac libero convallis, feugiat est eget, lacinia mauris. Vestibulum ac mauris congue, feugiat mauris ac, lobortis lorem. Vivamus quis dolor at massa dapibus accumsan id eu ex. Mauris sagittis volutpat orci id aliquet. Curabitur sollicitudin lectus odio, id porta ante finibus sed. Nam feugiat congue sodales. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi. Fusce quis metus cursus, mollis magna vel, porta augue. Vivamus a aliquam mi. Sed eros elit, suscipit vel convallis eu, aliquam ut justo. Phasellus id dolor pretium, molestie nulla in, tincidunt metus. Ut placerat lorem vitae lacus volutpat, malesuada hendrerit erat pretium. 
					</p>
				</div>
				<div class="row">
					<div class="col text-center">
						<h3>500.00</h3>
					</div>
				</div>
				<form action='payment.php' method='post'>
					<div class='row align-items-center justify-content-center'>
						<div class='col-3 text-center'>
							<label for='quantity' class='form-label'>Quantity</label>
							<input type='number' class='form-control' id='quantity' name='atomic-quantity' placeholder='Qty' min='0' max='10' step='1'>
						</div>
						<div class='col-3 text-center'>
							<input type='image' src='images/cart.svg' alt='submit' height='30' width='30px'>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-4 p-2">
				<div class='row'>
					<img src='images/volkl.png' class='img-fluid'>
				</div>
				<div class='row'>	
					<p class='mt-4'>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum venenatis enim vel eleifend faucibus. Nullam sed lacus a ante imperdiet lacinia quis vel orci. Donec gravida nibh at turpis pretium, eget finibus lorem pharetra. Maecenas ac libero convallis, feugiat est eget, lacinia mauris. Vestibulum ac mauris congue, feugiat mauris ac, lobortis lorem. Vivamus quis dolor at massa dapibus accumsan id eu ex. Mauris sagittis volutpat orci id aliquet. Curabitur sollicitudin lectus odio, id porta ante finibus sed. Nam feugiat congue sodales. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi. Fusce quis metus cursus, mollis magna vel, porta augue. Vivamus a aliquam mi. Sed eros elit, suscipit vel convallis eu, aliquam ut justo. Phasellus id dolor pretium, molestie nulla in, tincidunt metus. Ut placerat lorem vitae lacus volutpat, malesuada hendrerit erat pretium. 
					</p>
				</div>
				<div class="row">
					<div class="col text-center">
						<h3>300.00</h3>
					</div>
				</div>
				<form action='payment.php' method='post'>
					<div class='row align-items-center justify-content-center'>
						<div class='col-3 text-center'>
							<label for='quantity' class='form-label'>Quantity</label>
							<input type='number' class='form-control' id='quantity' name='atomic-quantity' placeholder='Qty' min='0' max='10' step='1'>
						</div>
						<div class='col-3 text-center'>
							<input type='image' src='images/cart.svg' alt='submit' height='30' width='30px'>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
			
<!--	<div class='container-fluid'>
		<div class='row'>
			<?php
				//$rows = 0;
				//while($rows <= 3) {
				//	for($count=1; $count <=3; ++$count) {
				//		echo "<div class='col'>".$count."</div>";
				//	}
				//	$count = 0;
				//	++$rows;
				//}
			?>
		</div>
	</div> -->
</body>
</html>