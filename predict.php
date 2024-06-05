<?php
include ('util_functions/session.php');
include ("util_functions/db.php");

if(!($_SESSION['type'] == 'user')){
    header('Location: home.php');
}

$id = $_SESSION['id'];

$sql = "SELECT * FROM patient_data WHERE userid=$id";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KidneySense</title>
    <link rel="stylesheet" href="css/user.css">
</head>
<body>
    <div style="width: 100vw; height: 100vh; display: flex; flex-direction: column; ">
        <div id="header">

        </div>

        <div style="width: 96%; height: auto; padding: 2%; overflow: auto; display: flex; flex-direction: column;align-items: center;">
            <form method='POST' action='util_functions/add_record.php' style=" width: auto; display: grid; ">
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
                    <button type='submit' style="width: max-content;">Predict</button>
            </form>
            <br><br><br>
            <h2>Records</h2>
            <br>
            <div style="width: 98%; ">
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

        <div id="footer">
            <div class="operation" style="background-color: #ff8282;" onclick='window.location.href = "util_functions/logout.php";'>Logout</div>
        </div>
    </div>
</body>
</html>