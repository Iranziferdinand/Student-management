<?php
session_start();
require 'db.php';

// if (!isset($_SESSION['loggedin'])) {
//     header('Location: login.php');
//     exit();
// }

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM student WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $Upassword = $_POST['password'];
    $email = $_POST['email'];
    $date_of_birth = $_POST['date_of_birth'];

    $sql = "UPDATE student SET username='$username', Upassword='$Upassword', email='$email', date_of_birth='$date_of_birth' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: select.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <input type="hidden" name="id" value="<?php echo $student['id']; ?>"><br>
    username: <input type="text" name="name" ><br><br>
    Upassword: <input type="text" name="password"><br><br>
    Email: <input type="email" name="email"><br><br>
    Date of Birth: <input type="date" name="date_of_birth"><br><br>
    <input type="submit" value="Update Student">
</form>
</body>
</html>
