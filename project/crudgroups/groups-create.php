<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Groups Create</title>
</head>
<body>
    <div class="container mt-5">
        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Groups Add 
                            <a href="../index.php" class="btn btn-secondary float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        
                        <form action="../code.php" method="POST">
                            <div class="mb-3">
                                <label for="visitor_name">Nama</label>
                                <?php 
                                include('../dbcon.php');
                                $datas = $con->query("SELECT visitors.visitor_name FROM visitors");
                                ?>
                                <select name="visitor_name" id="visitor_name" class="form-control">
                                    <?php foreach ($datas as $data): ?>
                                        <option value="<?php echo $data['visitor_name']; ?>"><?php echo $data['visitor_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="category_name">Category</label>
                                <?php 
                                include('../dbcon.php');
                                $categories = $con->query("SELECT category.category_name FROM category");
                                ?>
                                <select name="category_name" id="category_name" class="form-control">
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['category_name']; ?>"><?php echo $category['category_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="save_groups" class="btn btn-success">Create Group</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
