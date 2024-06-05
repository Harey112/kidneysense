<?php
session_start();

include ('util_functions/session.php');

if($_SESSION['type'] == 'admin'){
    header('Location: admin.php');
}elseif ($_SESSION['type'] == 'user') {
    header('Location: predict.php');
}

?>