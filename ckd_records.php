<?php

include ("util_functions/session.php");
include ("util_functions/db.php");


if(!($_SESSION['type'] == 'admin')){
    header('Location: home.php');
}


$sql = "SELECT * FROM patient_data";
$result = $conn->query($sql);
$sql = "SELECT * FROM users WHERE id=".$_SESSION['id'];
$user = $conn->query($sql)->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <link rel="stylesheet" href="css/main_layout.css">
    <link rel="stylesheet" href="css/ckd_records.css">
</head>
<body>
    <div class="container">
        <div class="side_bar">
            <div id="web_page_info">
                <img src="img/Chronic Kidney Disease Prediction System.png" style="width: 100%; height: 100%;">
            </div>
            <ul id="menus">
                <li class="menu" onclick='window.location.href = "home.php";'>Home</li>
                <li class="menu" onclick='window.location.href = "usermanagement.php";'>User Management</li>
                <li class="menu selected_menu" onclick='window.location.href = "ckd_records.php";'>Records</li>
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
                <form method='POST' action='util_functions/delete_patient_record.php' style=" width: 100%; display: flex; justify-content: space-around;">
                    <input type="text" name="id" id="userIdToDelete" style='display: none;'>
                    <button type='button' onclick="hideDeletePrompt()">Cancel</button>
                    <button type='submit' class='delete_btn'>Confirm</button>
                </form>
            </div>
        </div>



    <div class="prompt_background" id="add_record" style="display: none;">
        <div class="prompt_box" style="padding: 20px 40px;">
            <h3>Add Record</h3>
            <form method='POST' action='util_functions/add_record.php' style=" width: 100%; display: grid; ">
            <input type="text" name="userid" id="userid" value="<?php echo $_SESSION['id'];?>" style="display: none;">
            <table>
                <tbody>
                    <tr>
                        <td>Age</td>
                        <td><input type="number" step="any" id="age" name="age" placeholder="Enter age"></td>
                        <td>Blood Pressure</td>
                        <td><input type="number" step="any" id="blood_pressure" name="blood_pressure" placeholder="Enter blood pressure"></td>
                    </tr>
                    <tr>
                        <td>Specific Gravity</td>
                        <td><input type="number" step="any" step="0.01" id="specific_gravity" name="specific_gravity" placeholder="Enter specific gravity"></td>
                        <td>Albumin</td>
                        <td><input type="number" step="any" id="albumin" name="albumin" placeholder="Enter albumin"></td>
                    </tr>
                    <tr>
                        <td>Sugar</td>
                        <td><input type="number" step="any" id="sugar" name="sugar" placeholder="Enter sugar level"></td>
                        <td>Red Blood Cells</td>
                        <td>
                            <select name="red_blood_cells" id="red_blood_cells">
                                <option value="1">Normal</option>
                                <option value="0">Abnormal</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Pus Cell</td>
                        <td>
                            <select name="pus_cell" id="pus_cell">
                                <option value="1">Normal</option>
                                <option value="0">Abnormal</option>
                            </select>
                        </td>
                        <td>Pus Cell Clumps</td>
                        <td>
                            <select name="pus_cell_clumps" id="pus_cell_clumps">
                                <option value="1">Presented</option>
                                <option value="0">Not Presented</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Bacteria</td>
                        <td>
                            <select name="bacteria" id="bacteria">
                                <option value="1">Presented</option>
                                <option value="0">Not Presented</option>
                            </select>
                        </td>
                        <td>Blood Glucose (Random)</td>
                        <td><input type="number" step="any" id="blood_glucose_random" name="blood_glucose_random" placeholder="Enter blood glucose"></td>
                    </tr>
                    <tr>
                        <td>Blood Urea</td>
                        <td><input type="number" step="any" id="blood_urea" name="blood_urea" placeholder="Enter blood urea"></td>
                        <td>Serum Creatinine</td>
                        <td><input type="number" step="any" id="serum_creatinine" name="serum_creatinine" placeholder="Enter serum creatinine"></td>
                    </tr>
                    <tr>
                        <td>Sodium</td>
                        <td><input type="number" step="any" id="sodium" name="sodium" placeholder="Enter sodium"></td>
                        <td>Potassium</td>
                        <td><input type="number" step="any" id="potassium" name="potassium" placeholder="Enter potassium"></td>
                    </tr>
                    <tr>
                        <td>Haemoglobin</td>
                        <td><input type="number" step="any" id="haemoglobin" name="haemoglobin" placeholder="Enter haemoglobin"></td>
                        <td>Packed Cell Volume</td>
                        <td><input type="number" step="any" id="packed_cell_volume" name="packed_cell_volume" placeholder="Enter packed cell volume"></td>
                    </tr>
                    <tr>
                        <td>White Blood Cell Count</td>
                        <td><input type="number" step="any" id="white_blood_cell_count" name="white_blood_cell_count" placeholder="Enter white blood cell count"></td>
                        <td>Red Blood Cell Count</td>
                        <td><input type="number" step="any" id="red_blood_cell_count" name="red_blood_cell_count" placeholder="Enter red blood cell count"></td>
                    </tr>
                    <tr>
                        <td>Hypertension</td>
                        <td>
                            <select name="hypertension" id="hypertension">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </td>
                        <td>Diabetes Mellitus</td>
                        <td>
                            <select name="diabetes_mellitus" id="diabetes_mellitus">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Coronary Artery Disease</td>
                        <td>
                            <select name="coronary_artery_disease" id="coronary_artery_disease">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </td>
                        <td>Appetite</td>
                        <td>
                            <select name="appetite" id="appetite">
                                <option value="1">Good</option>
                                <option value="0">Poor</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Pedal Edema</td>
                        <td>
                            <select name="peda_edema" id="peda_edema">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </td>
                        <td>Anemia</td>
                        <td>
                            <select name="aanemia" id="aanemia">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
                <br>
                <button type='button' class='delete_btn' onclick="hideAddRecord()">Cancel</button>
                <button type='submit' >Confirm</button>
            </form>
        </div>
    </div>



        <div style="width: 100%;display: flex; justify-content: space-between; align-items: center; margin-top: 5px;">
                <h2 id="title">Records</h2>
                <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px;  margin-right: 5px;">
                    <div style="display: flex; width: 30px; height: 30px; border-radius: 50px; border: 2px dashed gray; padding: 5px; justify-content: center; align-items: center;">
                        <img src="img/icons8-user-96.png" style="width: 95%; height: 95%; ">
                    </div>
                    <h4><?php echo $user['firstname'].' '.$user['lastname'];?></h4>
                </div>
            </div>
        <br>
        <div style=" align-self: flex-end;">
            <button onclick="addRecord()">Add Record</button>
        </div>
            <div style="width: 98%; overflow: auto;">
                <table>
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Classification</th>
                            <th>Age</th>
                            <th>Blood pressure</th>
                            <th>Specific gravity</th>
                            <th>Albumin</th>
                            <th>Sugar</th>
                            <th>Red blood cells</th>
                            <th>Pus cell</th>
                            <th>Pus cell clumps</th>
                            <th>Bacteria</th>
                            <th>Blood glucose random</th>
                            <th>Blood urea</th>
                            <th>Serum creatinine</th>
                            <th>Sodium</th>
                            <th>Potassium</th>
                            <th>Haemoglobin</th>
                            <th>Packed cell volume</th>
                            <th>White blood cell count</th>
                            <th>Red blood cell count</th>
                            <th>Hypertension</th>
                            <th>Diabetes mellitus</th>
                            <th>Coronary artery disease</th>
                            <th>Appetite</th>
                            <th>Peda edema</th>
                            <th>Aanemia</th>
                            <th>User</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>".

                                "<td><button class='delete_btn' onclick=deleteRecordPrompt(".$row['id'].")>Delete</button></td>".
                                "<td style='background-color:".(($row['class'] == '0') ? "#ffb5b5" : "#47df47")."'>".(($row['class'] == '0') ? "Positive" : "Negative")."</td>".
                                "<td>".$row['age']."</td>".
                                 "<td>".$row['blood_pressure']."</td>".
                                 "<td>".$row['specific_gravity']."</td>".
                                 "<td>".$row['albumin']."</td>".
                                 "<td>".$row['sugar']."</td>".
                                 "<td>".(($row['red_blood_cells'] == '1') ? "Normal" : "Abnormal")."</td>".
                                 "<td>". (($row['pus_cell'] == '1') ? "Normal" : "Abnormal")."</td>".
                                 "<td>".$row['pus_cell_clumps']."</td>".
                                 "<td>".(($row['bacteria'] == '1') ? "Present" : "Not Present")."</td>".
                                 "<td>".$row['blood_glucose_random']."</td>".
                                 "<td>".$row['blood_urea']."</td>".
                                 "<td>".$row['serum_creatinine']."</td>".
                                 "<td>".$row['sodium']."</td>".
                                 "<td>".$row['potassium']."</td>".
                                 "<td>".$row['haemoglobin']."</td>".
                                 "<td>".$row['packed_cell_volume']."</td>".
                                 "<td>".$row['white_blood_cell_count']."</td>".
                                 "<td>".$row['red_blood_cell_count']."</td>".
                                 "<td>".(($row['hypertension'] == '1') ? "Yes" : "No")."</td>".
                                 "<td>".(($row['diabetes_mellitus'] == '1') ? "Yes" : "No")."</td>".
                                 "<td>".(($row['coronary_artery_disease'] == '1') ? "Yes" : "No")."</td>".
                                 "<td>".(($row['appetite'] == '1') ? "Good" : "Poor")."</td>".
                                 "<td>".(($row['peda_edema'] == '1') ? "Yes" : "No")."</td>".
                                 "<td>".(($row['aanemia'] == '1') ? "Yes" : "No")."</td>".
                                 "<td>".$row['userid']."</td>".
                            "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script>
    function deleteRecordPrompt(id){
    document.getElementById('userIdToDelete').value = id;
    document.getElementById('delete_prompt').style.display = 'flex';
}

function hideDeletePrompt(){
    document.getElementById('delete_prompt').style.display = 'none';
}


function addRecord(){
    document.getElementById('add_record').style.display = 'flex';

}


function hideAddRecord(){
    document.getElementById('add_record').style.display = 'none';
}
</script>
</html>