<?php
if(session_id()){
    session_destroy();
}

session_start();
include 'connection.php';


if(isset($_POST['uniteLogIn'])){

    $sqlQuery = "SELECT niss, nom, prenom, responsable_unite.id_adresse, email, telephone,unite.numero_agrement AS unite_number, unite.denomination AS unite_denom, federation_mouvement_jeunesse.denomination AS fed_denom
    FROM responsable_unite 
    INNER JOIN unite ON responsable_unite.num_agrement_unite = unite.numero_agrement 
    INNER JOIN federation_mouvement_jeunesse on unite.id_federation_mouvement_jeunesse = federation_mouvement_jeunesse.id
    WHERE niss = $_POST[uniteLogIn]" ;
    $info = $pdo->prepare($sqlQuery);
    $info->execute();
    $result = $info ->fetch();  
    if(!isset($result)) echo "no informations retrieved";

    $_SESSION['userLogged']=$_POST['uniteLogIn'];
    $_SESSION['userName']=$result['nom'];
    $_SESSION['userFname']=$result['prenom'];
    $_SESSION['userIdAdresse']=$result['id_adresse'];
    $_SESSION['userMail']=$result['email'];
    $_SESSION['userTelephoneNum']=$result['telephone'];
    $_SESSION['userUniteNum']=$result['unite_number'];
    $_SESSION['userUniteDenom']=$result['unite_denom'];
    $_SESSION['userFedDenom']=$result['fed_denom']; 
    
}
else if(isset($_POST['oneLogIn'])){
    
    $sqlQuery = "SELECT agent_one.*, federation_mouvement_jeunesse.denomination AS fed_denom
    FROM agent_one
    INNER JOIN federation_mouvement_jeunesse ON agent_one.attribution = federation_mouvement_jeunesse.id
    WHERE niss = $_POST[oneLogIn] " ;
    $info = $pdo->prepare($sqlQuery);
    $info->execute();
    $result = $info ->fetch();  
    if(!isset($result)) echo "no informations retrieved";

    $_SESSION['userLogged']=$_POST['oneLogIn'];
    $_SESSION['userName']=$result['nom'];
    $_SESSION['userFname']=$result['prenom'];
    $_SESSION['userMail']=$result['email'];
    $_SESSION['userTelephoneNum']=$result['telephone'];
    $_SESSION['userAttribution'] =$result['attribution'];
    $_SESSION['userFedDenom']=$result['fed_denom']; 
    
}
else {
    
    //session_destroy();
}

?>