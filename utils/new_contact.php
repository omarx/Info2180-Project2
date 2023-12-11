<?php
header('Content-Type: application/json');

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connection.php';

    $firstname = isset($_POST['fname']) ? trim($_POST['fname']) : '';
    $lastname = isset($_POST['lname']) ? trim($_POST['lname']) : '';
    $email = isset($_POST['email']) ? strtolower(trim($_POST['email'])) : '';
    $telephone = isset($_POST['telephone']) ? trim($_POST['telephone']) : '';
    $company = isset($_POST['company']) ? trim($_POST['company']) : '';
    $type = isset($_POST['type']) ? trim($_POST['type']):'';
    $assignedTo = isset($_POST['assigned']) ? trim($_POST['assigned']):'';
    $createdBy = 1; // You might want to dynamically set this based on session or other logic

    if ($stmt = $conn->prepare("INSERT INTO Contacts (title, firstname, lastname, email, telephone, company, type, assigned_to, created_by, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())")) {
        $stmt->bind_param("sssssssii", $title, $firstname, $lastname, $email, $telephone, $company, $type, $assignedTo, $createdBy);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $response = ['status' => 'success', 'message' => 'New contact created successfully.'];
        } else {
            $response = ['status' => 'error', 'message' => 'Error occurred during contact creation: ' . $stmt->error];
        }
        $stmt->close();
    } else {
        $response = ['status' => 'error', 'message' => 'Database preparation error.'];
    }
    $conn->close();
} else {
    $response = ['status' => 'error', 'message' => 'Invalid request method.'];
}

echo json_encode($response);
