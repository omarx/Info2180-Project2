<?php
header('Content-Type: application/json');

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connection.php';

    $firstname = trim($_POST['fname']);
    $lastname = trim($_POST['lname']);
    $email = strtolower(trim($_POST['email']));
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if (!userExists($conn, $email)) {

        if ($stmt = $conn->prepare("INSERT INTO Users (firstname, lastname, email, password, role, created_at) VALUES (?, ?, ?, ?, ?, NOW())")) {
            $stmt->bind_param("sssss", $firstname, $lastname, $email, $hashedPassword, $role);
             $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $response = ['status' => 'success', 'message' => 'New user created successfully.'];
            } else {
                $response = ['status' => 'error', 'message' => 'Error occurred during user creation: ' . $stmt->error];
            }

            $stmt->close();
        } else {
            $response = ['status' => 'error', 'message' => 'Database preparation error.'];
        }
    } else {
        $response = ['status' => 'error', 'message' => 'User with this email already exists.'];
    }

    $conn->close();
} else {
    $response = ['status' => 'error', 'message' => 'Invalid request method.'];
}

echo json_encode($response);
exit();
