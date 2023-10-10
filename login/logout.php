<?php
 
 include 'database/_dbconnect.php';
 session_start(); // from this session is started.
 
 unset($_SESSION['loggedin']); //
  
 session_destroy(); // This Destory the loign session.

 header("location: login.php"); // This will redirect to login page.
 ?>