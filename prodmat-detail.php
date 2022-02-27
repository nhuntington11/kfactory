<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <title>Kitten Factory - Order History</title>
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
                    <form action="prodmat-detail.php">
                        <label for="actionToAdd">Update:</label>
                        <select class="form-control" id="actionToAdd">
                            <option value="material">Material</option>
                            <option value="product">Product</option>
                        </select>
                        <input type="submit" value="Select" class="btn btn-primary btn-lg m-2">
                    </form>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <form action="prodmat-detail.php">
                        <label for="material" class="form-label">Material</label>
                        <select name="material" id="material" class="form-control">
                            <option value="ptex">PTEX</option>
                            <option value="steel_edges">Steel Edges</option>
                            <option value="add_new">Add new...</option>
                        </select>
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="quantity" min="1" max="999" step="1">
                        <label for="sku" class="form-label">SKU</label>
                        <input type="text" name="sku" placeholder="KFSXXX-XX" class="form-control">
                        <label for="date" class="form-label">Date Purchased</label>
                        <input type="date" name="date" class="form-control">
                        <input type="submit" value="Update Materials" class="btn btn-primary btn-lg m-2">
                    </form>
                    <a href="admin.php" class="btn btn-primary btn-lg m-2">Cancel</a>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-sm-6">
                    <form action="prodmat-detail.php">
                        <label for="prod_name" class="form-label">Product Name</label>
                        <input type="text" name="prod_name" placeholder="Product Name" class="form-control">
                        <label for="prod_type" class="form-label">Type</label>
                        <input type="text" name="prod_type" placeholder="Type of product (ski/snowboard)" class="form-control">
                        <label for="manuf_cost" class="form-label">Manufacturing Cost</label>
                        <input type="number" name="manuf_cost" placeholder="Cost of manufacturing" class="form-control">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" placeholder="Description of Product" class="form-control">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" placeholder="Price" min="0.01" max="10000.00" step="0.01">
                        <label for="img_path" class="form-label">Image Path</label>
                        <input type="text" class="form-control" name="img_path" placeholder="/img/...">
                        <input type="submit" value="Update Products" class="btn btn-primary btn-lg m-2">
                    </form>
                    <a href="admin.php" class="btn btn-primary btn-lg m-2">Cancel</a>
                </div>
            </div>
        </div>
    </body>
</html>