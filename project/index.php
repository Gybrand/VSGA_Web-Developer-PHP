<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: auth/login.php');
    exit;
}
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #home {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5)), url(image/header.png);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        #home h1, #home h4 {
            text-shadow: 4px 4px black;
        }
    </style>

    <link rel="icon" href="image/Logoo.png">

    <title>enVisitory</title>
</head>
<body>
    <?php include('header.php'); ?>
    <div class="container p-4">
        <div class="rounded-4 p-4 text-center text-white" id="home">
        <h1 class="fw-bold">enVisitory</h1>
        <h4 class="fw-bolder">Record Your Visitor</h4>
    </div>
    <div class="container mt-4">
        <?php include('crudvisitor/message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Visitor Details
                            <a href="crudvisitor/visitor-create.php" class="btn btn-success float-end">Add Visitors</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search']; } ?>" class="form-control" placeholder="Search by name" required>
                                <button type="submit" class="btn btn-success">Search</button>
                            </div>
                        </form>

                        <div style="overflow-x: auto;">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Phone Number</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $query = "SELECT * FROM visitors";
                                    if (isset($_GET['search'])) {
                                        $filtervalues = $_GET['search'];
                                        $query .= " WHERE visitor_name LIKE '%$filtervalues%'";
                                    }
                                    $query_run = mysqli_query($con, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $visitor) {
                                            ?>
                                            <tr>
                                                <td><?= $visitor['id']; ?></td>
                                                <td><?= $visitor['visitor_name']; ?></td>
                                                <td><?= $visitor['age']; ?></td>
                                                <td><?= $visitor['gender']; ?></td>
                                                <td><?= $visitor['phone']; ?></td>
                                                <td><?= $visitor['created_at']; ?></td>
                                                <td>
                                                    <a href="crudvisitor/visitor-view.php?id=<?= $visitor['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="crudvisitor/visitor-edit.php?id=<?= $visitor['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_visitor" value="<?= $visitor['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='7' class='text-center'>No Record Found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel 2 -->

    <div class="container mt-4">
        <?php include('crudcategory/message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Category Details
                            <a href="crudcategory/category-create.php" class="btn btn-success float-end">Add Category</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div style="overflow-x: auto;">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $query = "SELECT * FROM category";
                                    $query_run = mysqli_query($con, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $category) {
                                            ?>
                                            <tr>
                                                <td><?= $category['id']; ?></td>
                                                <td><?= $category['category_name']; ?></td>
                                                <td>
                                                    <a href="crudcategory/category-view.php?id=<?= $category['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="crudcategory/category-edit.php?id=<?= $category['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_category" value="<?= $category['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='7' class='text-center'>No Record Found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel 3 -->

    <div class="container mt-4">
        <?php include('crudgroups/message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Groups Details
                            <a href="crudgroups/groups-create.php" class="btn btn-success float-end">Add Groups</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div style="overflow-x: auto;">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $query = "SELECT * FROM groups";
                                    $query_run = mysqli_query($con, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $groups) {
                                            ?>
                                            <tr>
                                                <td><?= $groups['id']; ?></td>
                                                <td><?= $groups['visitor_name']; ?></td>
                                                <td><?= $groups['category_name']; ?></td>
                                                <td>
                                                    <a href="crudgroups/groups-view.php?id=<?= $groups['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="crudgroups/groups-edit.php?id=<?= $groups['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_groups" value="<?= $groups['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='7' class='text-center'>No Record Found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
