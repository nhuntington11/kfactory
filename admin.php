<?php

$page_roles = array('admin', 'employee');

require_once 'check_session.php';
require_once 'header.html';

?>
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
                            <a class="nav-link" aria-current="page" href="order-history.php">Order History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add-user.php">Add User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="prodmat-detail.php">Update Product or Material</a>
                        </li>
                    </ul>
                </div>
            </div>
            </nav>
        </header>

        <div class="container">
            <div class="row m-4 p-4 border-bottom border-primary">
                <div class="col-6">
                    <h4>Sales Report</h4>
                    <form action="admin.php">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control">
                        <label for="end_date" class="form-label">Start Date</label>
                        <input type="date" name="end_date" class="form-control">
                        <input type="submit" value="Generate Sales Report" class="btn btn-primary btn-lg m-2">
                    </form>
                </div>
                <div class="col-6">
                    <h4>Product Report</h4>
                    <form action="admin.php">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control">
                        <label for="end_date" class="form-label">Start Date</label>
                        <input type="date" name="end_date" class="form-control">
                        <input type="submit" value="Generate Product Report" class="btn btn-primary btn-lg m-2">
                    </form>
                </div>
            </div>
            <form action="admin.php">
                <div class="row m-2 mb-4 border border-primary">
                    <div class="col-md-3">
                        <img src="default_user.png" alt="profile_pic.png" width="200px" height="200px">
                    </div>
                    <div class="col-md-6">
                        <div class="row m-2">
                            <div class="col">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" name="firstname" value="Thomas">
                            </div>
                            <div class="col">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" name="lastname" value="Pynchon">
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col">
                                <label for="idnumber">Id Number</label>
                                <input type="text" class="form-control" name="idnumber" value="1">
                            </div>
                            <div class="col">
                                <label for="role">Role</label>
                                <select class="form-control" name="role" id="userrole">
                                    <option>Customer</option>
                                    <option>Employee</option>
                                    <option>Admininstrator</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row m-2">
                            <div class="col">
                                <a class="btn btn-primary btn-lg btn-block" href="add-user.php" role="button">Details</a>
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col">
                                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Save Changes">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form action="admin.php">
                <div class="row m-2 mb-4 border border-primary">
                    <div class="col-md-3">
                        <img src="default_user.png" alt="profile_pic.png" width="200px" height="200px">
                    </div>
                    <div class="col-md-6">
                        <div class="row m-2">
                            <div class="col">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" name="firstname" value="Hilaree">
                            </div>
                            <div class="col">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" name="lastname" value="Nelson">
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col">
                                <label for="idnumber">Id Number</label>
                                <input type="text" class="form-control" name="idnumber" value="2">
                            </div>
                            <div class="col">
                                <label for="role">Role</label>
                                <select class="form-control" name="role" id="userrole">
                                    <option>Customer</option>
                                    <option>Employee</option>
                                    <option>Admininstrator</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row m-2">
                            <div class="col">
                                <a class="btn btn-primary btn-lg btn-block" href="add-user.php" role="button">Details</a>
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col">
                                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Save Changes">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form action="admin.php">
                <div class="row m-2 mb-4 border border-primary">
                    <div class="col-md-3">
                        <img src="default_user.png" alt="profile_pic.png" width="200px" height="200px">
                    </div>
                    <div class="col-md-6">
                        <div class="row m-2">
                            <div class="col">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" name="firstname" value="Alex">
                            </div>
                            <div class="col">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" name="lastname" value="Lowe">
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col">
                                <label for="idnumber">Id Number</label>
                                <input type="text" class="form-control" name="idnumber" value="3">
                            </div>
                            <div class="col">
                                <label for="role">Role</label>
                                <select class="form-control" name="role" id="userrole">
                                    <option>Customer</option>
                                    <option>Employee</option>
                                    <option>Admininstrator</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row m-2">
                            <div class="col">
                                <a class="btn btn-primary btn-lg btn-block" href="add-user.php" role="button">Details</a>
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col">
                                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Save Changes">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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

