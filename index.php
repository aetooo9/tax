<?php
session_start();

require "conn.php";


if (isset($_POST['login'])){

    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];

    $q = "select count(1) as num_rows,user_id,user_name from users where user_name=? and password=?";
    $r = $conn->prepare($q);
    $r->bind_param("ss", $UserName, $Password);
    $r->execute();
    $rr = $r->get_result();
    $row = $rr->fetch_assoc();



    if($row['num_rows'] > 0){
        $_SESSION['status'] = 1;
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['user_name'];
        echo "<script>location.href='home.php';</script>";
    }else { 
        $msg = "UserName and Password is incorrect";
    }

}


?>
<!DOCTYPE html>
<html>


<?php include('head.html'); ?>

<body>
<center>
    <h1>Login Screen</h1> 
    <img src="./img/login.png" width="100" height="100" alt="login icon" title="login icon">
    <form method="post"  action="index.php">
        <?php echo $msg; ?>
        <table class="login">
            <tr>
                <td>Email</td>
                <td><input type="text" class="form-control"  name="UserName" placeholder="UserName"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" class="form-control"  name="Password" placeholder="Password"></td>
            </tr>
            <tr>
                <td class="center" colspan="2">
                    <input type="submit" class="btn btn-dark" name="login" value="login">
                </td>
            </tr>
        </table>
    </form>

</center>



</body>



</html>