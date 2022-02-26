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

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <form action="add-user.php">
                    <div class="form-row">
                        <div class="col-sm-3">
                            <img src="default_user.png" alt="profile_pic.png" width="200px" height="200px">
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="firstname">First Name</label>
                                            <input type="text" class="form-control" name="firstname" value="Thomas">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" class="form-control" name="lastname" value="Pynchon">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <a class="btn btn-primary btn-lg btn-block" href="add-user.php" role="button">Details</a>
                                </div>
                            </row>
                            <div class="row">
                                <div class="col-3">
                                    <label for="idnumber">Id Number</label>
                                    <input type="text" class="form-control" name="idnumber" value="1">
                                </div>
                                <div class="col-3">
                                    <label for="role">Role</label>
                                    <select class="form-control" name="role" id="userrole">
                                        <option>Customer</option>
                                        <option>Employee</option>
                                        <option>Admininstrator</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>  
        </div>
    </body>

