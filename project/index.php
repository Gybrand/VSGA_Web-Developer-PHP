<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: register.php');
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
    
    <title>Library Visitor</title>
</head>
<body>
    <?php include('header.php'); ?>
    
    <div class="container mt-4">

        <?php include('crud/message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Library Visitor Details
                            <a href="crud/visitor-create.php" class="btn btn-primary float-end">Add Visitors</a>
                        </h4>
                        <!--<a href="logout.php" class="btn btn-danger float-end me-2">Logout</a> Logout button -->
                    </div>
                    <div style="overflow-x: auto; margin-right: 20px;">
                        <div class="card-body">
                            <form action="" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>

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
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            if(isset($_GET['search']))
                                            {
                                                $filtervalues = $_GET['search'];
                                                $query = "SELECT * FROM visitors WHERE CONCAT(name) LIKE '%$filtervalues%' ";
                                                $query_run = mysqli_query($con, $query);

                                                if(mysqli_num_rows($query_run) > 0)
                                                {
                                                    foreach($query_run as $items)
                                                    {
                                                    }
                                                }
                                                else
                                                {
                                                    echo "<h5> No Record Found </h5>";
                                                }
                                            }

                                            foreach($query_run as $visitor)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $visitor['id']; ?></td>
                                                    <td><?= $visitor['name']; ?></td>
                                                    <td><?= $visitor['age']; ?></td>
                                                    <td><?= $visitor['gender']; ?></td>
                                                    <td><?= $visitor['phone']; ?></td>
                                                    <td><?= $visitor['created_at']; ?></td>
                                                    <td>
                                                        <a href="crud/visitor-view.php?id=<?= $visitor['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                        <a href="crud/visitor-edit.php?id=<?= $visitor['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                        <form action="code.php" method="POST" class="d-inline">
                                                            <button type="submit" name="delete_visitor" value="<?=$visitor['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "<h5> No Record Found </h5>";
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
