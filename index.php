<?php

include_once 'header.html';
include_once 'dbinfo.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die ($conn->connect_error);

echo <<<_NAV
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Kitten Factory</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="order-history.php">Order History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin.php">Admininstrator</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="login.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<body>
<div class="album py-5 bg-light">
<div class="wrapper">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
_NAV;

$query = "SELECT prod_id, prod_name, description, price, img_path FROM product";

$result = $conn->query($query);
if (!$result) echo "ERROR";

$rows = $result->num_rows;

for ($i=0; $i<$rows; ++$i) {
  $result->data_seek($i);
  $ski = $result->fetch_array(MYSQLI_ASSOC);

  $prod_id = $ski['prod_id'];
  $prod_name = $ski['prod_name'];
  $img_path = $ski['img_path'];
  $description = $ski['description'];
  $price = $ski['price'];

  echo <<<_SKI
  <div class="col">
    <div class="card shadow-sm">
      <img class="bd-placeholder-img card-img-top" src="$img_path">
      <div class="card-body">
        <p class="card-text">$description</p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <form action="payment.php" method="post">
              <input type="hidden" name="prod_id" value="$prod_id">
              <input type="hidden" name="prod_name" value="$prod_name">
              <input type="hidden" name="price" value="$price">
              <input type="hidden" name="img_path" value="$img_path">
              <button type="submit" class="btn btn-sm btn-outline-secondary">Add to cart</button></a>
            </form>
          </div>
          <small class="text-muted">$price</small>
        </div>
      </div>
    </div>
  </div>
  _SKI;
}

echo <<<_END
</div>
</div>
</div>
_END;

include_once 'footer.html';

?>