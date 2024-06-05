<?php
include "db.php"; 



// Check if data is sent via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"));

    //Encrypt Password
    $hashed_password = password_hash($data->password, PASSWORD_ARGON2I);

    // Check for duplicate username
    $sql = "SELECT username FROM users WHERE username='$data->username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      //Execute if username is already taken
      echo json_encode(["success" => false, "message" => "Username has already been taken!"]);

    } else {
      //Execute if username is unique

      //Check if password matched
        if ($data->password == $data->c_password) {
            //Execute if password matched

            // Insert data
            $sql = "INSERT INTO users (lastname, firstname, middlename, username, type, password) VALUES ('$data->lastname', '$data->firstname', '$data->middlename', '$data->username','$data->usertype', '$hashed_password')";

            if ($conn->query($sql) === TRUE) {
                echo json_encode(["success" => true, "message" => "New record created successfully"]);
            } else {
                echo json_encode(["success" => false, "message" => $conn->error]);
            }
        } else {
          //Execute if password didnt matched.
            echo json_encode(["success" => false, "message" => "Passwords doesn't match."]);
        }
    }
} else {
    // Handle if no data is received
    echo json_encode(["success" => false, "message" => "No data received."]);
}

// Close the database connection
$conn->close();
?>
