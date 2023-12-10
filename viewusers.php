<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $contactId = $_GET['id'];

    $sql = "SELECT * FROM Contacts WHERE id = $contactId"; 
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 1) {
        $contact = mysqli_fetch_assoc($result);
        echo "<h1>Contact Details</h1>";
        echo "<p>ID: " . $contact['id'] . "</p>";
        echo "<p>Name: " . $contact['firstname'] . " " . $contact['lastname'] . "</p>";
        echo "<p>Email: " . $contact['email'] . "</p>";
    } else {
        echo "Contact not found";
    }
} else {
    echo "Invalid contact ID";
}

mysqli_close($connection);
?>
