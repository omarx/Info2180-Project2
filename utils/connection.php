<?php
$host = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'dolphin_crm';

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function userExists($conn, $email): bool
{
    $stmt = $conn->prepare("SELECT id FROM Users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $exists = $result->num_rows > 0;
    $stmt->close();
    return $exists;
}

function createUser($conn, $firstname, $lastname, $email, $password, $role): void
{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO Users (firstname, lastname, password, email, role, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("sssss", $firstname, $lastname, $hashedPassword, $email, $role);
    $stmt->execute();
    $stmt->close();
}

$adminEmail = 'admin@project2.com';
if (!userExists($conn, $adminEmail)) {
    createUser($conn, 'Admin', 'User', $adminEmail, 'password123', 'admin');
}



