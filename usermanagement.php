<?php

include ("util_functions/session.php");
include ("util_functions/db.php");


if(!($_SESSION['type'] == 'admin')){
    header('Location: home.php');
}


$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$sql = "SELECT * FROM users WHERE id=".$_SESSION['id'];
$user = $conn->query($sql)->fetch_assoc();





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="css/main_layout.css">
    <link rel="stylesheet" href="css/userm.css">
</head>
<body>
    <div class="container">
        <div class="side_bar">
            <div id="web_page_info">
                <img src="img/Chronic Kidney Disease Prediction System.png" style="width: 100%; height: 100%;">
            </div>
            <ul id="menus">
            <li class="menu" onclick='window.location.href = "home.php";'>Home</li>
                <li class="menu selected_menu" onclick='window.location.href = "usermanagement.php";'>User Management</li>
                <li class="menu" onclick='window.location.href = "ckd_records.php";'>Records</li>
            </ul>
            <div class="operations">
                <div class="operation" style="background-color: #ff8282;" onclick='window.location.href = "util_functions/logout.php";'>Logout</div>
            </div>
        </div>
        <div class="content_box">

        <div class="prompt_background" id="delete_prompt" style="display: none;">
            <div class="prompt_box">
                <h3>Are sure do you want to delete?</h3>
                <br>
                <form method='POST' action='util_functions/delete_user.php' style=" width: 100%; display: flex; justify-content: space-around;">
                    <input type="text" name="id" id="userIdToDelete" style='display: none;'>
                    <button type='button' onclick="hideDeletePrompt()">Cancel</button>
                    <button type='submit' class='delete_btn'>Confirm</button>
                </form>
            </div>
        </div>
        <div class="prompt_background" id="update_user" style="display: none;">
        <div class="prompt_box" style="padding: 20px 40px;">
            <h3>Update User</h3>
            <br>
            <form method='POST' action='util_functions/update_user.php' style=" width: 100%; display: grid; ">
                <input type="text" name="id" id="update_id" style='display: none;'>
                <table style="border-color: transparent;">
                    <tbody>
                        <tr>
                            <td style="border-color: transparent;"><label for="">Lastname:</label></td>
                            <td  style="border-color: transparent;"> <input type="text" name="lastname" id="update_lastname"></td>
                        </tr>
                        <tr>
                            <td style="border-color: transparent;"><label for="">Firstname</label></td>
                            <td style="border-color: transparent;"><input type="text" name="firstname" id="update_firstname"></td>
                        </tr>
                        <tr >
                            <td style="border-color: transparent;"><label for="">Middlename</label></td>
                            <td style="border-color: transparent;"><input type="text" name="middlename" id="update_middlename"></td>
                        </tr>
                        <tr>
                            <td style="border-color: transparent;"><label for="">Username</label></td>
                            <td style="border-color: transparent;"><input type="text" name="username" id="update_username"></td>
                        </tr>
                        <tr>
                            <td style="border-color: transparent;"><label for="type">User Type</label></td>
                            <td style="border-color: transparent;"><select name="type" id="update_type">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select></td>
                        </tr>
                        <tr>
                            <td style="border-color: transparent;"><label for="">Password</label></td>
                            <td style="border-color: transparent;"><input type="password" name="password" id="update_password"></td>
                        </tr>
                        <tr>
                            <td style="border-color: transparent;"><label for="">Confirm Password</label></td>
                            <td style="border-color: transparent;"><input type="password" name="c_password" id="uc_password"></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <button type='button' onclick="hideEditUser()">Cancel</button>
                <button type='submit' class='delete_btn'>Confirm</button>
            </form>
        </div>
    </div>


            <div style="width: 100%;display: flex; justify-content: space-between; align-items: center; margin-top: 5px;">
                <h2 id="title">User Management</h2>
                <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px;  margin-right: 5px;">
                    <div style="display: flex; width: 30px; height: 30px; border-radius: 50px; border: 2px dashed gray; padding: 5px; justify-content: center; align-items: center;">
                        <img src="img/icons8-user-96.png" style="width: 95%; height: 95%; ">
                    </div>
                    <h4><?php echo $user['firstname'].' '.$user['lastname'];?></h4>
                </div>
            </div>
            <br>
            <br>
            <form action="index.php" style=" align-self: flex-end;" method="post">
                <input type="text" name="view" id="view" style='display: none;' value="register">
                <button >Add New User</button>
            </form>
            <br>
            <table>
                <thead>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Type</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                        if ($result->num_rows > 0) {
                            
                            while($row = $result->fetch_assoc()) {
                                echo "
                                <tr>
                                <td>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</td>
                                <td>".$row['username']."</td>
                                <td>".$row['type']."</td>
                                <td><button class='edit_btn' onclick=\"editUser('".$row['id']."', '".$row['firstname']."', '".$row['middlename']."', '".$row['lastname']."', '".$row['username']."', '".$row['type']."')\">Edit</button> <button class='delete_btn' onclick=deleteUserPrompt(".$row['id'].")>Delete</button></td>
                                </tr>
                                ";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
var delete_div = document.getElementById('delete_prompt');


function deleteUserPrompt(id){
    document.getElementById('userIdToDelete').value = id;
    delete_div.style.display = 'flex';
}

function hideDeletePrompt(){
    delete_div.style.display = 'none';
}



function editUser(id, firstname, middlename, lastname, username, type){
    document.getElementById('update_firstname').value = firstname;
    document.getElementById('update_middlename').value = middlename;
    document.getElementById('update_lastname').value = lastname;
    document.getElementById('update_username').value = username;
    document.getElementById('update_type').value = type;
    document.getElementById('update_id').value = id;
    document.getElementById('update_user').style.display = 'flex';

}


function hideEditUser(){
    document.getElementById('update_user').style.display = 'none';
}

</script>
</body>
</html>