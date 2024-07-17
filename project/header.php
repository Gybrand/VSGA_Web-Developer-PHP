<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>enVisitory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .navbar-nav .nav-link {
            font-size: 20px; /* Change this value to adjust the text size */
        }
        
    </style>
</head>

<body>


</div>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="image/Logo.png" alt="../Logo.png" style="width:40px;" class="rounded-pill">
            </a>
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">enVisitory</a>
                <!-- </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="offcanvas" data-bs-target="#demo">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Guide</a>
                </li> -->
            </ul>
            <ul class="navbar-nav">
            <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="offcanvas" data-bs-target="#demo">Menu</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- <div class="p-5 bg-success text-white text-center">
        <h1>LVR</h1>
        <p>Library Visitor Recording</p>
    </div> -->

    <!-- Button to open the offcanvas -->
    <!-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        Open Offcanvas
    </button> -->

    <!-- Offcanvas component -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="demo" aria-labelledby="demo" data-bs-backdrop="false">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <p>You want to log out?</p>
            <!-- <a href="logout.php" class="btn btn-danger active float-start me-2 btn-lg btn-block">Logout</a> -->
            <button onclick="location.href='auth/logout.php'" class="btn btn-danger active float-start me-2 btn-lg btn-block"><i class="fas fa-sign-out-alt"></i> Log Out </button>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>