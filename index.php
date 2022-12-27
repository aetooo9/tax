<?php

require "conn.php";


if (isset($_POST['login'])){

    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];

    $q = "select * from users where UserName='".$UserName."' and Password='".$Password."'";
    $r = $conn->query($q);

    $n = $r->num_rows();

    if($n > 0){
        echo "UserName and Password is correct";
    }else { 
        echo "UserName and Password is incorrect";
    }

}


?>
<!DOCTYPE html>
<html>

<head>
<title>Login Page</title>
<meta charset="UTF-8">
<meta name="descrption" contant="My First Page">
<meta name="kewords" contant="My, First, Page">

<link href="./css/style.css" rel="stylesheet">
</head>

<body>
<center>
    <h1>Login Screen</h1> 
    <img src="./img/login.png" width="100" height="100" alt="login icon" title="login icon">
    <form method="post"  action="index.php">
        <table class="login" >
            <tr>
                <td>Email</td>
                <td><input type="email" name="UserName" placeholder="Email"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="Password" placeholder="Password"></td>
            </tr>
            <tr>
                <td class="center" colspan="2">
                    <input type="submit" name="login" value="login">
                </td>
            </tr>
        </table>
    </form>

</center>



</body>



</html>