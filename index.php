<?php

require "conn.php";


if (isset($_POST['login'])){

    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];

    $q = "select count(1) as num_rows from users where user_name=? and password=?";
    $r = $conn->prepare($q);
    $r->bind_param("ss", $UserName, $Password);
    $r->execute();
    $rr = $r->get_result();
    $row = $rr->fetch_assoc();



    if($row['num_rows'] > 0){
        echo "<script>location.href='home';</script>";
    }else { 
        $msg = "UserName and Password is incorrect";
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
        <?php echo $msg; ?>
        <table class="login" >
            <tr>
                <td>Email</td>
                <td><input type="text" name="UserName" placeholder="UserName"></td>
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