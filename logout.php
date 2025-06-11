<?php
session_start();
include("dbconnction.php"); 
    // Set session variables
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);

    // Redirect to homepage or dashboard
    header("Location: login.php");
    exit();
?>