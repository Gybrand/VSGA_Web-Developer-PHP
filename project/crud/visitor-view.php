<?php
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

    <title>Visitor View</title>
</head>
<body>
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Visitor View Details 
                            <a href="../index.php" class="btn btn-secondary float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $visitor_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM visitors WHERE id='$visitor_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $visitor = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Nama</label>
                                        <p class="form-control">
                                            <?=$visitor['name'];?>
                                        </p>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>Umur</label>
                                        <p class="form-control">
                                            <?=$visitor['age'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>gender</label>
                                        <p class="form-control">
                                            <?=$visitor['gender'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>No. Hp</label>
                                        <p class="form-control">
                                            <?=$visitor['phone'];?>
                                        </p>
                                    </div>
                                    

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