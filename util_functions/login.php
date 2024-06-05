<?php
include "db.php";

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the JSON data from the request
    $data = file_get_contents("php://input");
    $user = json_decode($data);
  
    // Check if username and password are provided
    if (isset($user->username) && isset($user->password)) {
        // Fetch user from the database using prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT id, type, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $user->username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Check if user exists
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];
            
            // Verify password
            if (password_verify($user->password, $hashed_password)) {
                // Password is correct, login successful
                session_start();
                $_SESSION['username'] = $user->username;
                $_SESSION['type'] =  $row['type'];
                $_SESSION['id'] = $row['id'];
                echo json_encode(array("success" => true, "message" => "Login successful"));
            } else {
                // Password is incorrect
                echo json_encode(array("success" => false, "message" => "Incorrect password"));
            }
        } else {
            // User not found
            echo json_encode(array("success" => false, "message" => "Invalid Credentials."));
        }
        
        // Close statement and database connection
        $stmt->close();
    } else {
        // Invalid request, username or password missing
        echo json_encode(array("success" => false, "message" => "Invalid Credentials."));
    }
} else {
    // Invalid method
    echo json_encode(array("success" => false, "message" => "Invalid request method"));
}


$conn->close();
?>
