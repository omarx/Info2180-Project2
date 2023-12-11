<?php
include 'base.php';
include './utils/connection.php';
session_start();

$loggedInUserId = $_SESSION['user_id'] ?? null;
$filterType = $_GET['filterType'] ?? 'All';

if ($filterType === 'Assigned to me' && $loggedInUserId) {
    $sql = "SELECT * FROM Contacts WHERE assigned_to = $loggedInUserId";
} else {
    $sql = "SELECT * FROM Contacts";
}

$result = $conn->query($sql); //
?>

<main>
    <div class="inline-form-row">
        <h1>Dashboard</h1>
        <button> <i class="bi bi-plus"></i> Add Contact</button>
    </div>
    <div class="container">
        <div class="inline-span-row">
            <span><strong><i class="bi bi-funnel-fill"></i> Filter By:</strong></span>
            <span class="filter-option">All</span>
            <span class="filter-option">Sales Lead</span>
            <span class="filter-option">Support</span>
            <span class="filter-option">Assigned to me</span>
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
