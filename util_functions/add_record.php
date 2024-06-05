<?php
include 'db.php';


$age = $_POST['age'];
$userid = $_POST['userid'];
$blood_pressure = $_POST['blood_pressure'];
$specific_gravity = $_POST['specific_gravity'];
$albumin = $_POST['albumin'];
$sugar = $_POST['sugar'];
$red_blood_cells = $_POST['red_blood_cells'];
$pus_cell = $_POST['pus_cell'];
$pus_cell_clumps = $_POST['pus_cell_clumps'];
$bacteria = $_POST['bacteria'];
$blood_glucose_random = $_POST['blood_glucose_random'];
$blood_urea = $_POST['blood_urea'];
$serum_creatinine = $_POST['serum_creatinine'];
$sodium = $_POST['sodium'];
$potassium = $_POST['potassium'];
$haemoglobin = $_POST['haemoglobin'];
$packed_cell_volume = $_POST['packed_cell_volume'];
$white_blood_cell_count = $_POST['white_blood_cell_count'];
$red_blood_cell_count = $_POST['red_blood_cell_count'];
$hypertension = $_POST['hypertension'];
$diabetes_mellitus = $_POST['diabetes_mellitus'];
$coronary_artery_disease = $_POST['coronary_artery_disease'];
$appetite = $_POST['appetite'];
$peda_edema = $_POST['peda_edema'];
$aanemia = $_POST['aanemia'];


$class = exec("python classify.py ../model/model.pkl $age $blood_pressure $specific_gravity $albumin $sugar $red_blood_cells $pus_cell $pus_cell_clumps $bacteria $blood_glucose_random $blood_urea $serum_creatinine $sodium $potassium $haemoglobin $packed_cell_volume $white_blood_cell_count $red_blood_cell_count $hypertension $diabetes_mellitus $coronary_artery_disease $appetite $peda_edema $aanemia");

$sql = "INSERT INTO `patient_data`(`age`, `blood_pressure`, `specific_gravity`, `albumin`, `sugar`, `red_blood_cells`, `pus_cell`, `pus_cell_clumps`, `bacteria`, `blood_glucose_random`, `blood_urea`, `serum_creatinine`, `sodium`, `potassium`, `haemoglobin`, `packed_cell_volume`, `white_blood_cell_count`, `red_blood_cell_count`, `hypertension`, `diabetes_mellitus`, `coronary_artery_disease`, `appetite`, `peda_edema`, `aanemia`, `class`, `userid`) VALUES ('$age','$blood_pressure','$specific_gravity','$albumin','$sugar','$red_blood_cells','$pus_cell','$pus_cell_clumps','$bacteria','$blood_glucose_random','$blood_urea','$serum_creatinine','$sodium','$potassium','$haemoglobin','$packed_cell_volume','$white_blood_cell_count','$red_blood_cell_count','$hypertension','$diabetes_mellitus','$coronary_artery_disease','$appetite','$peda_edema','$aanemia', '$class', '$userid')";
if($conn->query($sql)){
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
?>