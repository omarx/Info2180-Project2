<?php
$sql = "SELECT id, file_name, file_content FROM files";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $fileId = $row['id'];
        $fileName = $row['file_name'];
        $fileContent = $row['file_content'];

        echo "<a href='download.php?id=$fileId'>$fileName</a><br>";
    }
} else {
    echo "No files found";
}

// Close the database connection
mysqli_close($connection);
?>