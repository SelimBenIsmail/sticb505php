<?php
session_start();
include 'connection.php';
if(isset($_POST['octroi'])){
    
    $postNumDos = $_SESSION['numDos']; 
    $postIdAgentTraitant = $_SESSION['userLogged'];
    $postStatut = 'Accordé';
    $postMontant = $_POST['montant'];
    
    $sqlQuery= "INSERT INTO decision (numero_dossier, statut, id_agent_traitant, montant_subside) 
        VALUES (:numero_dossier, :statut, :id_agent_traitant, :montant_subside)";

    $insertData = $pdo->prepare($sqlQuery);
    $insertData->execute([
        'numero_dossier'=> "$postNumDos",
        'statut'=>"$postStatut",
        'montant_subside'=>"$postMontant",
        'id_agent_traitant'=>"$postIdAgentTraitant" 
    ]);

    $sqlQuery= "UPDATE demande_subside SET statut = :statut WHERE numero_dossier = $_SESSION[numDos] ";
    $insertData = $pdo->prepare($sqlQuery);
    $insertData->execute([
        'statut'=>"$postStatut"
    ]);




}

else if(isset($_POST['refus'])){
    $postData = $_POST;
    $postNumDos=$_SESSION['numDos'];
    $postIdAgentTraitant=$_SESSION['userLogged'];
    $postStatut="Refusé";
    $postRaison =$postData['raison'];


    $sqlQuery= "INSERT INTO decision (numero_dossier, statut,id_agent_traitant, motivation_decision) 
        VALUES (:numero_dossier, :statut,:id_agent_traitant,:motivation_decision)";

    $insertData = $pdo->prepare($sqlQuery);
    $insertData->execute([
        'numero_dossier'=> "$postNumDos",
        'statut'=>"$postStatut",
        'id_agent_traitant'=>"$postIdAgentTraitant",
        'motivation_decision'=>"$postRaison"
    ]);

    $sqlQuery= "UPDATE demande_subside SET statut = :statut WHERE numero_dossier = $_SESSION[numDos] ";
    $insertData = $pdo->prepare($sqlQuery);
    $insertData->execute([
        'statut'=>"$postStatut"
    ]);
}

?>


<meta http-equiv="refresh" content="1; url=../UIone/ui_one.php" /> 