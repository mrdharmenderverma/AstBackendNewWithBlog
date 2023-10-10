<?php include 'login/database/_dbconnect.php';
    
    $idd = $_GET['id'];

    $delete = mysqli_query($conn, "DELETE FROM `datablog` WHERE id = '".$idd."'" );

    header("location: blog-details.php");
?>