<?php

include ("session.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vital Signs </title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Vital Signs Form</h1>
        <form action="upload_ckd.php" method="POST" style="height: auto;width: 100%;background-color: transparent;border: 2px solid gray;padding: 10px;flex-direction: row;max-width: 90%;justify-content: space-around;align-items: flex-start;">
            <div style="height: auto;width: 45%;gap: 5px;display: grid;justify-items: center;align-content: center;">
                <div class="input_field">
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age">
                </div>
                <div class="input_field">
                    <label for="blood_pressure">Blood Pressure</label>
                    <input type="number" id="blood_pressure" name="blood_pressure">
                </div>
                <div class="input_field">
                    <label for="specific_gravity">Specific Gravity</label>
                    <input type="number" step="0.01" id="specific_gravity" name="specific_gravity">
                </div>
                <div class="input_field">
                    <label for="albumin">Albumin</label>
                    <input type="number" id="albumin" name="albumin">
                </div>
                <div class="input_field">
                    <label for="sugar">Sugar</label>
                    <input type="number" id="sugar" name="sugar">
                </div>
                <div class="input_field">
                    <label for="red_blood_cells">Red Blood Cells</label>
                    <select name="red_blood_cells" id="red_blood_cells">
                        <option value="1">Normal</option>
                        <option value="0">Abnormal</option>
                    </select>
                </div>
                <div class="input_field">
                    <label for="pus_cell">Pus Cell</label>
                    <select name="pus_cell" id="pus_cell">
                        <option value="1">Normal</option>
                        <option value="0">Abnormal</option>
                    </select>
                </div>
                <div class="input_field">
                    <label for="pus_cell_clumps">Pus Cell Clumps</label>
                    <select name="pus_cell_clumps" id="pus_cell_clumps">
                        <option value="1">Presented</option>
                        <option value="0">Not Presented</option>
                    </select>
                </div>
                <div class="input_field">
                    <label for="bacteria">Bacteria</label>
                    <select name="bacteria" id="bacteria">
                        <option value="1">Presented</option>
                        <option value="0">Not Presented</option>
                    </select>
                </div>
                <div class="input_field">
                    <label for="blood_glucose_random">Blood Glucose (Random)</label>
                    <input type="number" id="blood_glucose_random" name="blood_glucose_random">
                </div>
                <div class="input_field">
                    <label for="blood_urea">Blood Urea</label>
                    <input type="number" id="blood_urea" name="blood_urea">
                </div>
                <div class="input_field">
                    <label for="serum_creatinine">Serum Creatinine</label>
                    <input type="number" id="serum_creatinine" name="serum_creatinine">
                </div>
            </div>
            <div style="height: auto;width: 45%;gap: 5px;display: grid;justify-items: center;align-content: center;">
                <div class="input_field">
                    <label for="sodium">Sodium</label>
                    <input type="number" id="sodium" name="sodium">
                </div>
                <div class="input_field">
                    <label for="potassium">Potassium</label>
                    <input type="number" id="potassium" name="potassium">
                </div>
                <div class="input_field">
                    <label for="haemoglobin">Haemoglobin</label>
                    <input type="number" id="haemoglobin" name="haemoglobin">
                </div>
                <div class="input_field">
                    <label for="packed_cell_volume">Packed Cell Volume</label>
                    <input type="number" id="packed_cell_volume" name="packed_cell_volume">
                </div>
                <div class="input_field">
                    <label for="white_blood_cell_count">White Blood Cell Count</label>
                    <input type="number" id="white_blood_cell_count" name="white_blood_cell_count">
                </div>
                <div class="input_field">
                    <label for="red_blood_cell_count">Red Blood Cell Count</label>
                    <input type="number" id="red_blood_cell_count" name="red_blood_cell_count">
                </div>
                <div class="input_field">
                    <label for="hypertension">Hypertension</label>
                    <select name="hypertension" id="hypertension">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="input_field">
                    <label for="diabetes_mellitus">Diabetes Mellitus</label>
                    <select name="diabetes_mellitus" id="diabetes_mellitus">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="input_field">
                    <label for="coronary_artery_disease">Coronary Artery Disease</label>
                    <select name="coronary_artery_disease" id="coronary_artery_disease">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="input_field">
                    <label for="appetite">Appetite</label>
                    <select name="appetite" id="peda_edema">
                        <option value="1">Good</option>
                        <option value="0">Poor</option>
                    </select>
                </div>
                <div class="input_field">
                    <label for="peda_edema">Pedal Edema</label>
                    <select name="peda_edema" id="peda_edema">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="input_field">
                    <label for="aanemia">Anemia</label>
                    <select name="aanemia" id="aanemia">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <button type="submit" style="background-color: rgb(104 164 255);">Submit</button>
            </div>
            
        </form>
    </div>
</body>
</html>