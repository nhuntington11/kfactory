<?php

?>

<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel='stylesheet' href='stylesheet.css'>
	</head>

	<body id=page>
		
		<nav class='navbar navbar-default'>
			<div class='container-fluid'>
				<div class='navbar-header'>
					<a class='navbar-brand logo' href='home.php'>Kitten Factory</a>
				</div>
				<ul class='nav navbar-nav'>
					<li class='active'><a href='login.php'>Login</a></li>
				</ul>
			</div>
		</nav>
			
		<div class='container-fluid'>
			<div class='row'>
				<?php
					$rows = 0;
					while($rows <= 3) {
						for($count=1; $count <=3; ++$count) {
							echo "<div class='col'>".$count."</div>";
						}
						$count = 0;
						++$rows;
					}
				?>
			</div>
		</div>
	</body>
</html>