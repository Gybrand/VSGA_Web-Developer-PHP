<!DOCTYPE html>
<html>

  <head>
    <style>
      #outer-div {
        width: 100%;
        text-align: center;
        background-color: #FFFFFF
      }
      #inner-div {
        display: inline-block;
        margin: 0 auto;
        padding: 20px;
        background-color: #FFFFFF
      }
    </style>
  </head>
  
  <body>
  <div class="col-md-12">
    <h1>Library Management System
    <a href="logout.php" class="btn btn-danger float-end me-2">Logout</a>  
    </h1><!--Logout button -->
  </div>
  



  
     
    <div id="outer-div">

      <div id="inner-div"> <?php include('display-image.php'); ?></div>
    </div>
  </body>
</html>