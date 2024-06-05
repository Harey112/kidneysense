<?php

include ("session.php");
include ("db.php");

$id = $_POST['id'];
$lname = $_POST['lastname'];
$fname = $_POST['firstname'];
$mname = $_POST['middlename'];
$username = $_POST['username'];
$type = $_POST['type'];
$password = $_POST['password'];
$c_password = $_POST['c_password'];

if (!($password == $c_password)){
    echo $password;
    echo "<script>alert('Password didn't matched!');</script>";
}

$sql = "UPDATE `users` SET `lastname`='$lname',`firstname`='$fname',`middlename`='$mname',`type`='$type',`username`='$username'".((empty($password))? "": ", `password`='".password_hash($password, PASSWORD_ARGON2I)."'")." WHERE id='$id'";
    
if($conn->query($sql)){
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
?>