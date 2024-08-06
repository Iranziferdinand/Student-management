<?php
session_start();
require 'db.php';

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $date_of_birth = $_POST['date_of_birth'];

    $sql = "INSERT INTO student(username,Upassword, email, date_of_birth) 
            VALUES ('$username', '$password', '$email', '$date_of_birth')";

    if (mysqli_query($conn,$sql)){
        echo "New student created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    if(empty($username) || empty($password) || empty($email) || empty($date_of_birth)){
        header('location:select.php');
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="">
    username: <input type="text" name="username"><br><br>
    Upassword: <input type="text" name="password"><br><br>

    Email: <input type="email" name="email"><br><br>
    Date of Birth: <input type="date" name="date_of_birth"><br><br>
    <input type="submit" name="submit" value="Create Student">
    <input type="submit" name="select" value="Select">
 
</form>

</body>
</html>





