<?php include 'login/database/_dbconnect.php';
    if(isset($_POST['delete_record']))
    $idd = $_GET['category_id'];
    $delete = mysqli_query($conn, "DELETE FROM `categories` WHERE id = '".$idd."'" );
    header("location: category-list.php");
?>