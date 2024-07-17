<?php
session_start();
require 'dbcon.php';

if(isset($_POST['save_visitor']))
{
    $name = mysqli_real_escape_string($con, $_POST['visitor_name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $phone= mysqli_real_escape_string($con, $_POST['phone']);

    $query = "INSERT INTO visitors (visitor_name,age,gender,phone) VALUES ('$name','$age','$gender','$phone')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Visitor Created Successfully";
        header("Location: crudvisitor/visitor-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Visitor Not Created";
        header("Location: crudvisitor/visitor-create.php");
        exit(0);
    }
}

if(isset($_POST['update_visitor']))
{
    $visitor_id = mysqli_real_escape_string($con, $_POST['visitor_id']);

    $name = mysqli_real_escape_string($con, $_POST['visitor_name']);
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

/* Category */

if(isset($_POST['save_category']))
{
    $category_name = mysqli_real_escape_string($con, $_POST['category_name']);


    $query = "INSERT INTO category (category_name) VALUES ('$category_name')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Category Created Successfully";
        header("Location: crudcategory/category-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Category Not Created";
        header("Location: crudcategory/category-create.php");
        exit(0);
    }
}

if(isset($_POST['update_category']))
{
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

    $category_name = mysqli_real_escape_string($con, $_POST['category_name']);



    $query = "UPDATE category SET name='$category_name' WHERE id='$category_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Category Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Category Not Updated";
        header("Location: index.php");
        exit(0);
    }

}

if(isset($_POST['delete_category']))
{
    $category_id = mysqli_real_escape_string($con, $_POST['delete_category']);

    $query = "DELETE FROM category WHERE id='$category_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Category Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Category Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

/* Groups */

if (isset($_POST['save_groups'])) {
    $visitor_name = mysqli_real_escape_string($con, $_POST['visitor_name']);
    $category_name = mysqli_real_escape_string($con, $_POST['category_name']);

    $query = "INSERT INTO groups (visitor_name, category_name) VALUES ('$visitor_name', '$category_name')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Group created successfully";
        header("Location: index.php");
        exit(0);
    } else {
        error_log("Query failed: " . mysqli_error($con));
        $_SESSION['message'] = "Group creation failed";
        header("Location: crudgroups/groups-create.php");
        exit(0);
    }
}


if (isset($_POST['update_groups'])) {
    $group_id = mysqli_real_escape_string($con, $_POST['group_id']);
    $visitor_name = mysqli_real_escape_string($con, $_POST['visitor_name']);
    $category_name = mysqli_real_escape_string($con, $_POST['category_name']);

    $query = "UPDATE groups SET visitor_name='$visitor_name', category_name='$category_name' WHERE id='$group_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Group updated successfully";
        header("Location: index.php");
        exit(0);
    } else {
        error_log("Query failed: " . mysqli_error($con));
        $_SESSION['message'] = "Group update failed";
        header("Location: crudgroups/groups-edit.php?id=$group_id");
        exit(0);
    }
}



if (isset($_POST['delete_groups'])) {
    $group_id = mysqli_real_escape_string($con, $_POST['delete_groups']);

    $query = "DELETE FROM groups WHERE id='$group_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Group deleted successfully";
        header("Location: index.php");
        exit(0);
    } else {
        error_log("Query failed: " . mysqli_error($con));
        $_SESSION['message'] = "Group deletion failed";
        header("Location: crudgroups/groups-list.php");
        exit(0);
    }
}


?>
