<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: auth/login.php');
    exit;
}
require 'dbcon.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <?php include('header.php'); ?>

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
                                                <td><?= $groups['name']; ?></td>
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
    
</body>
</html>