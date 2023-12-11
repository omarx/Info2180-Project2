<?php

header('Content-Type: application/json');

include 'connection.php';
$response = [];

$sql = "SELECT id, firstname, lastname FROM Users";
$result = $conn->query($sql);

if ($result) {
    $users = [];

    while ($row = $result->fetch_assoc()) {
        $users[] = [
            'id' => $row['id'],
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname']
        ];
    }

    $response = ['status' => 'success', 'users' => $users];
} else {
    $response = ['status' => 'error', 'message' => 'Error fetching users: ' . $conn->error];
}

$conn->close();

echo json_encode($response);

