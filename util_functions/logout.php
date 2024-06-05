<?php

session_start(); // Start the session

// Unset the 'username' session variable
unset($_SESSION['username']);
unset($_SESSION['type']);
unset($_SESSION['id']);

// Destroy the session
session_destroy();

// Redirect to the home page
header("Location: ../home.php");
?>