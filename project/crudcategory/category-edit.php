<?php
session_start();
require '../dbcon.php';
include 'message.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Category Edit</title>
</head>
<body>

    <div class="container mt-5">

        <?php include('category-message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Patiant Edit 
                            <a href="../index.php" class="btn btn-secondary float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $category_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM category WHERE id='$category_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $category = mysqli_fetch_array($query_run);
                                ?>
                                <form action="../code.php" method="POST">
                                    <input type="hidden" name="category_id" value="<?= $category['id']; ?>">

                                    <div class="mb-3">
                                        
                                        <label>Nama</label>
                                        <input type="text" name="category_name" value="<?=$category['category_name'];?>" class="form-control">
                                    </div>
                            
                                    
                                    <div class="mb-3">
                                        <button type="submit" name="update_category" class="btn btn-success">
                                            Update Category
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>