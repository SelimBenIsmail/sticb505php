<?php
session_start();

if(isset($_POST['details'])){
    $_SESSION['numDos'] = $_POST['details'];
}

//echo $_SESSION['numDos'];

?>
<meta http-equiv="refresh" content="1; url= ../UIone/subside_details.php" /> 