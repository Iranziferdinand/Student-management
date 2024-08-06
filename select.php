<?php
session_start();
require 'db.php';


$sql = "SELECT * FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
               <th>username</th>
                <th>Upassword</th>
                <th>email</th>
                 <th>date_of_birth</th>

                <th>Actions</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['username']}</td>
                <td>{$row['Upassword']}</td>
                <td>{$row['email']}</td>
                <td>{$row['date_of_birth']}</td>
                <td>
                    <a href='update.php?id={$row['id']}'>Edit</a>
                    <a href='delete.php?id={$row['id']}'>Delete</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No students found.";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select</title>
</head>
<body><br><br>
    <a href="logout.php">Logout</a><br><br>
    <a href="Create_Student.php">add more student</a>
</body>
</html>
