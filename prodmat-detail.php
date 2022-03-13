<?php

include_once 'header.html';
include_once 'dbinfo.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die ($conn->connect_error);

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
            <li class="nav-item">
                <a class="nav-link" href="admin.php">Administrator</a>
            </li>
        </ul>
    </div>
</div>
</nav>
</header>

<div class="container">
<div class="row justify-content-center">
    <div class="col-sm-3">
        <form action="prodmat-detail.php" method="post">
            <label for="actionToAdd">Update:</label>
            <select class="form-control" name="actionToAdd">
                <option value="choose" selected>Choose option...</option>
                <option value="material">Material</option>
                <option value="product">Product</option>
            </select>
            <input type="submit" value="Select" class="btn btn-primary btn-lg m-2">
        </form>
    </div>
</div>
_NAV;

if(isset($_POST['actionToAdd'])) {
    $action = $_POST['actionToAdd'];

    if ($action == 'material') {
        echo <<<_MAT
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form action="prodmat-detail.php" method="post">
                    <label for="material" class="form-label">Material</label>
                    <select name="material" id="material" class="form-control">
                        <option value="ptex" selected>PTEX</option>
                        <option value="steel_edges">Steel Edges</option>
                        <option value="add_new">Add new...</option>
                    </select>
                    <label for="matquantity" class="form-label" required>Quantity</label>
                    <input type="number" class="form-control" name="matquantity" min="1" max="999" step="1">
                    <label for="date" class="form-label">Date Purchased</label>
                    <input type="date" name="date" class="form-control">
                    <input type="submit" value="Update Materials" class="btn btn-primary btn-lg m-2">
                </form>
                <a href="admin.php" class="btn btn-primary btn-lg m-2">Cancel</a>
            </div>
        </div>
        _MAT;
    }

    if ($action == 'product') {
        echo <<<_PROD
        <div class="row justify-content-center mt-5">
            <div class="col-sm-6">
                <form action="prodmat-detail.php" method="post">
                    <label for="prod_name" class="form-label">Product Name</label>
                    <input type="text" name="prod_name" placeholder="Product Name" class="form-control" required>
                    <label for="prod_type" class="form-label">Type</label>
                    <select name="prod_type" class="form-control">
                        <option value="ski">Ski</option>
                        <option value="snowboard">Snowboard</option>
                    </select>
                    <label for="manuf_cost" class="form-label">Manufacturing Cost</label>
                    <input type="number" name="manuf_cost" placeholder="Cost of manufacturing" class="form-control" required>
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" placeholder="Description of Product" class="form-control" required>
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" placeholder="Price" min="0.01" max="10000.00" step="0.01" required>
                    <label for="img_path" class="form-label">Dimensions</label>
                    <input type="number" class="form-control" name="dims" placeholder="Length" min="150" max="210" step="1" required>
                    <label for="img_path" class="form-label">Image Path</label>
                    <input type="text" class="form-control" name="img_path" placeholder="/img/..."required>
                    <input type="submit" value="Update Products" class="btn btn-primary btn-lg m-2">
                </form>
                <a href="admin.php" class="btn btn-primary btn-lg m-2">Cancel</a>
            </div>
        </div>
        _PROD;
    }
}

if (isset($_POST['matquantity'])) {
    $quantity = (int)$_POST['matquantity'];
    $material = $_POST['material'];

    $query = "UPDATE raw_material SET quantity = quantity+$quantity WHERE material_name = '$material'";

    $result = $conn->query($query);
    if (!$result) echo "ERROR";

    header('Location: admin.php');
}

if (isset($_POST['prod_name'])) {
    $prod_name = $_POST['prod_name'];
    $prod_type = $_POST['prod_type'];
    $manuf_cost = $_POST['manuf_cost'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $img_path = $_POST['img_path'];
    $dimensions = $_POST['dims'];

    $query = "INSERT INTO product (prod_name, description, type, price, manufacturing_cost, dimensions, img_path) VALUES ('$prod_name', '$desc', '$prod_type', $price, $manuf_cost, $dimensions, '$img_path')";

    $result = $conn->query($query);
    if (!$result) echo "ERROR";

    header('Location: admin.php');
}

include_once 'footer.html';

?>