<?php
require 'db.php';
$errors = array();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = trim($_POST['uname']);
    $password = trim($_POST['password']);

    // Validation
    if (empty($username) || !preg_match("/[A-Za-z]/", $username)) {
        $errors[] = "The username is required and should contain only letters.<br><br>";
    }
    if (empty($password) || strlen($password) < 8) {
        $errors[] = "The password should not be empty and must be at least 8 characters long.<br><br>";
    }

    if (count($errors) == 0) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into the database
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

        if (mysqli_query($conn, $sql)) {
            echo "The account was created successfully.";
        } else {
            echo "Failed to insert data.";
        }
    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }

    if (isset($_POST['login'])) {
        header("Location: login.php");
        exit();
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
<style>
    body{
        background-color: antiquewhite;
        
    }
    .for2{
     background-color: yellowgreen;
     width: 250px;
     height: 280px;
     top: 10pxpx;
     border-radius: 5px;
     padding: 20px;
     font-size: 30px;

    }
</style>
<body>
    <center>
    <h2>wellcome to registration form</h2>
    <form action="register.php" method="POST" class="for2">
       
     user_name:<input type="text" name="uname"><br><br>
     password:<input type="password" name="password"><br><br>
     <input type="submit" name="register" value="register">
     <input type="submit" name="login" value="login">

    </form>
    </center>
</body>
</html>