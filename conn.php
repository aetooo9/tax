
<?php

$servername = "";
$username = "";
$password = "";
$db = "";


// Create connection
$conn = new mysqli($servername, $username, $password, $db);

if($conn->error-connection){
   echo "error connction !!";
}


?>