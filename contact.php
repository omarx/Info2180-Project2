<?php
include 'base.php';
include './utils/connection.php'; // Ensure this path is correct

// Fetch contacts from the database
$sql = "SELECT * FROM Contacts";
$result = $conn->query($sql);
?>

<main>
    <div class="inline-form-row">
        <h1>Dashboard</h1>
        <button> <i class="bi bi-plus"></i> Add Contact</button>
    </div>
    <div class="container">
        <div class="inline-span-row">
            <span><strong><i class="bi bi-funnel-fill"></i> Filter By:</strong></span>
            <span>All</span>
            <span>Sales Lead</span>
            <span>Support</span>
            <span>Assigned to me</span>
        </div>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Company</th>
                <th>Type</th>
                <th></th>
            </tr>
            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $fullName = $row['firstname'] . ' ' . $row['lastname'];
                    $type = strtoupper($row['type']); // Transform to uppercase
                    echo "<tr>
                            <td>$fullName</td>
                            <td>{$row['email']}</td>
                            <td>{$row['company']}</td>
                            <td><span>$type</span></td>
                            <td><a href='#'>View</a></td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No contacts found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</main>
