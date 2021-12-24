<?php

session_start();
if(isset($_POST['uniteLogIn'])){
    
    $_SESSION['userLogged']=$_POST['uniteLogIn'];

}
else {
    
    session_destroy();
}

?>