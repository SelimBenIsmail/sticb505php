<?php
if(session_id()){
    session_destroy();
}
session_start();
if(isset($_POST['uniteLogIn'])){
    
    $_SESSION['userLogged']=$_POST['uniteLogIn'];

}
else if(isset($_POST['oneLogIn'])){
    $_SESSION['userLogged']=$_POST['oneLogIn'];
}
else {
    
    //session_destroy();
}

?>