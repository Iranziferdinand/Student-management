<?php
session_start();
require 'db.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM student WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert(your data is deleted!);</scipt>";
        header('Location: select.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>