<?php include 'login/database/_dbconnect.php';
    
    $idd = $_GET['id'];    

    $delete = mysqli_query($conn, "DELETE FROM `datablog` WHERE id = '".$idd."'" );

    if($delete){
        session_start();
        $_SESSION['status'] = "Blog Successfully Deleted!";
        $_SESSION['status_code'] = "warning";
        header("location: blog-details.php");
    }

?>