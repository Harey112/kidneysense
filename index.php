<?php

session_start();



if(isset($_POST['view']) && !empty($_POST['view'])){
    $view = $_POST['view'];
}else{
    $view = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <div class="container" id="container1" style="display: flex;flex-direction: row;flex-wrap: nowrap;align-items: center;">
        <form action="" method="post" id="uni_form">
        </form>

        <div id="other_content">

        
        </div>
    </div>
</body>
<script>
    var view = "<?php echo $view; ?>";
</script>
<script src="js/main.js"></script>
<script src="js/login.js"></script>
<script src="js/register.js"></script>
</html>