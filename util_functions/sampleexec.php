<?php
// Command to activate the virtual environment and run the Python script
$command = "python classify.py ../model/model.pkl 25 80 1.025 0 0 1 1 0 0 121 19 1.2 142 4.9 15 48 6900 5.3 0 0 0 0 0 0";

$output = [];
$return_var = null;

exec($command, $output, $return_var);

if ($return_var === 0) {
    // Command executed successfully
    echo "Command executed successfully\n";
    // Output of the command
    echo "Output:\n";
    print_r($output);
} else {
    // Command failed
    echo "Command failed with return code: $return_var\n";
}
?>