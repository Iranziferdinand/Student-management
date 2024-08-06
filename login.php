<?php
session_start();
require 'db.php';
if($_SERVER['REQUEST_METHOD'] =='POST'){
    $username=$_POST['uname'];
    $password=$_POST['password'];

    $sql="select * from users WHERE username='$username'";
    $result=mysqli_query($conn,$sql);

    if($result->num_rows>0){
        $user=$result->fetch_assoc();
    if($password==$user['password'] && $username==$user['username']){
            $_SESSION['loggedin']=true;
            $_SESSION['username']=$username;
            header("location: Create_Student.php");
           }
           if($password!=$user['password'] && $username!=$user['username']){
            $_SESSION['loggedin']=true;
            $_SESSION['username']=$username;
            header("location: login.php");
           }
             else{
            echo "invalid password";
            }
    
            }
            else{
            echo "user not found";
            }
    
            }
            if(isset($_POST['dont'])){
                header("location:register.php");
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
    .for{
     background-color: yellowgreen;
     width: 250px;
     height: 300px;
     top: 10pxpx;
     border-radius: 5px;
     padding: 20px;
     font-size: 30px;

    }
</style>
<body>
    <center>
    <h2>wellcome to login form</h2>
   <form class="for" action="" method="POST" >
    username:<input type="text" name="uname" required><br><br>
    password:<input type="password" name="password" required><br><br>
    <input type="submit" name="login" value="login"><br>
    <a href="register.php"> don't have account</a>
   

   

   </form> 
    </center>
</body>
</html>