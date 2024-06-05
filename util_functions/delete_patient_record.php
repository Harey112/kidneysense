<?php

include ("session.php");
include ("db.php");

$id = $_POST['id'];

$sql = "DELETE FROM patient_data WHERE id=$id";

if($conn->query($sql)){
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

?>