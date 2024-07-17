<?php
session_start();
require 'dbcon.php';

if(isset($_POST['save_visitor']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $phone= mysqli_real_escape_string($con, $_POST['phone']);

    $query = "INSERT INTO visitors (name,age,gender,phone) VALUES ('$name','$age','$gender','$phone')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Visitor Created Successfully";
        header("Location: crud/visitor-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Visitor Not Created";
        header("Location: crud/visitor-create.php");
        exit(0);
    }
}

if(isset($_POST['update_visitor']))
{
    $visitor_id = mysqli_real_escape_string($con, $_POST['visitor_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $phone= mysqli_real_escape_string($con, $_POST['phone']);


    $query = "UPDATE visitors SET name='$name', age='$age', gender='$gender', phone='$phone' WHERE id='$visitor_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Visitor Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Visitor Not Updated";
        header("Location: index.php");
        exit(0);
    }

}

if(isset($_POST['delete_visitor']))
{
    $visitor_id = mysqli_real_escape_string($con, $_POST['delete_visitor']);

    $query = "DELETE FROM visitors WHERE id='$visitor_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Visitor Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Visitor Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

?>