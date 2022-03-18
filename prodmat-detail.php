<?php

$page_roles = array('admin', 'employee');

require_once 'check_session.php';
require_once 'header.html';
require_once 'dbinfo.php';
require_once 'sanitize.php';

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
            <div class="col-sm">
                <table class="table">
                    <thead>
                        <td>Product</td>
                        <td>Quantity</td>
                        <td>Last Purchased</td>
                    </thead>
                    <tbody>
        _MAT;

        $material_query = $conn->query("SELECT * FROM raw_material");
        if (!$material_query) echo "COULD NOT RUN QUERY";

        $rows = $material_query->num_rows;

        for ($i=0; $i<$rows; ++$i) {
            $material_query->data_seek($i);
            $material = $material_query->fetch_array(MYSQLI_ASSOC);

            echo <<<_ROW
                <tr>
                    <td>$material[material_name]</td>
                    <td>$material[quantity]</td>
                    <td>$material[date_purchased]</td>
                </tr>
            _ROW;
        }

        echo <<<_MAT
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form action="prodmat-detail.php" method="post">
                    <label for="material" class="form-label">Material</label>
                    <select name="material" id="material" class="form-control">
                        <option value="ptex" selected>PTEX</option>
                        <option value="steel_edges">Steel Edges</option>
                        <option value="plastic">Plastic</option>
                    </select>
                    <label for="matquantity" class="form-label" required>Quantity</label>
                    <input type="number" class="form-control" name="matquantity" min="1" max="999" step="1">
                    <label for="date" class="form-label">Date Purchased</label>
                    <input type="date" name="purchase_date" class="form-control">
                    <input type="submit" value="Update Materials" class="btn btn-primary btn-lg m-2">
                </form>
                <a href="admin.php" class="btn btn-primary btn-lg m-2">Cancel</a>
            </div>
        </div>
        _MAT;
    }

    if ($action == 'product') {

        $result = $conn->query("SELECT * FROM product");
        if (!$result) echo "No Existing Products";

        $rows = $result->num_rows;

        echo <<<_ROW
        <div class="row">
        _ROW;

        for ($i=0; $i<$rows; ++$i) {
            $row = $result->data_seek($i);
            $ski = $result->fetch_array(MYSQLI_ASSOC);

            echo <<<_SKIS
                <div class="col-4">
                    <div class="card shadow-sm">
                        <img class="bd-placeholder-img card-img-top" src="$ski[img_path]">
                        <div class="card-body">
                            <p class="card-text">$ski[description]</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <form action="prodmat-detail.php" method="post">
                                        <input type="hidden" name="prod_id" value="$ski[prod_id]">
                                        <div class="row">
                                            <div class="col">
                                                <label for="prod_name" class="form-label">Product</label>
                                                <input type="text" class="form-input" name="prod_name" value="$ski[prod_name]">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="price" class="form-label">Price</label>
                                                <input type="number" class="form-input" name="price" value="$ski[price]">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="quantity" class="form-label">Quantity</label>
                                                <input type="number" class="form-input" name="quantity" value="$ski[quantity]">
                                            </div>
                                        </div>
                                        <input type="hidden" name="update_ski" value="set">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Update Ski</button></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            _SKIS;
        }

        echo <<<_ENDROW
        </div>
        _ENDROW;

        echo <<<_PROD
        <div class="row">
            <div class="col-6">
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
                    <input type="hidden" name="new_product" value="new">
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
    $date = $_POST['purchase_date'];

    $query = "UPDATE raw_material SET quantity = quantity + $quantity, date_purchased = '$date' WHERE material_name = '$material'";

    $result = $conn->query($query);
    if (!$result) echo "ERROR";

    header('Location: admin.php');
}

if (isset($_POST['new_prod'])) {
    $prod_name = $_POST['prod_name'];
    $prod_type = $_POST['prod_type'];
    $manuf_cost = $_POST['manuf_cost'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $img_path = $_POST['img_path'];
    $dimensions = $_POST['dims'];

    $add_ski_result = $conn->query("INSERT INTO product (prod_name, description, type, price, manufacturing_cost, dimensions, img_path) VALUES ('$prod_name', '$desc', '$prod_type', $price, $manuf_cost, $dimensions, '$img_path')");
    if (!$add_ski_result) echo "ERROR";

    $update_materials_query = $conn->query("UPDATE raw_material SET ptex = ptex - 1, steel_edges = steel_edges - 1, plastic = plastic - 1");
    if (!$update_materials_query) echo "COULD NOT UPDATE MATERIALS";

    header('Location: admin.php');
}

if (isset($_POST['update_ski'])) {
    $prod_id = $_POST['prod_id'];
    $prod_name = sanitize($conn, $_POST['prod_name']);
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $result = $conn->query("UPDATE product SET prod_name = '$prod_name', price = $price, quantity = $quantity WHERE prod_id = $prod_id");
    if (!$result) echo "ERROR UPDATING PRODUCT <a href='prodmat-detail.php>go back</a>";

    $update_ptex_query = $conn->query("UPDATE raw_material SET quantity = quantity - 1 WHERE material_name = 'ptex'");
    $update_steel_edges_query = $conn->query("UPDATE raw_material SET quantity = quantity - 1 WHERE material_name = 'steel_edges'");
    $update_plastic_query = $conn->query("UPDATE raw_material SET quantity = quantity - 1 WHERE material_name = 'plastic'");
    if (!$update_ptex_query | !$update_steel_edges_query | !$update_plastic_query) echo "COULD NOT UPDATE MATERIALS";
}

include_once 'footer.html';

?>