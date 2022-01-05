<?php

function getNumDos ()
{
    include 'connection.php';
    $sqlQuery = "SELECT numero_dossier FROM camp WHERE num_agrement_unite = $_SESSION[userUniteNum] ORDER BY numero_dossier DESC LIMIT 1 " ;
    $numDos = $pdo->prepare($sqlQuery);
    $numDos->execute();
    $result = $numDos ->fetch();  
    if(isset($result)){
        $_SESSION['numDos'] =$result['numero_dossier'];
        //return $_SESSION['numDos'];
    }  
}

function getIdAdresse ()
{
    include 'connection.php';
    $sqlQuery = "SELECT id_adresse FROM adresse ORDER BY id_adresse DESC LIMIT 1 " ;
    $operation = $pdo->prepare($sqlQuery);
    $operation->execute();
    $result = $operation ->fetch();  
    if(isset($result)) return $result['id_adresse'] ;
}

function countEnfant(){
    include 'connection.php';
    $sqlQuery = " SELECT COUNT(*) FROM enfant_camp WHERE numero_dossier = $_SESSION[numDos] " ;
    $operation = $pdo->prepare($sqlQuery);
    $operation->execute();
    $result = $operation ->fetch();  
    if(isset($result))return $result['COUNT(*)'];
}
function countEnfant6(){
    include 'connection.php';
    $sqlQuery = "SELECT COUNT(*) FROM enfant_camp 
    INNER JOIN enfant ON enfant_camp.niss_enfant = enfant.niss
    WHERE numero_dossier = $_SESSION[numDos] AND (
        SELECT DATEDIFF(enfant.date_naissance,". date('Y-m-d'). "=". 365*6 .")
    );" ;
    $operation = $pdo->prepare($sqlQuery);
    $operation->execute();
    $result = $operation ->fetch();  
    if(isset($result))return $result['COUNT(*)'];
}

function countEncadrant(){
    include 'connection.php';
    $sqlQuery = " SELECT COUNT(*) FROM encadrant_camp WHERE numero_dossier = $_SESSION[numDos] " ;
    $operation = $pdo->prepare($sqlQuery);
    $operation->execute();
    $result = $operation ->fetch();  
    if(isset($result))return $result['COUNT(*)'];
}

function countBrevet(){
    include 'connection.php';
    $sqlQuery = " SELECT COUNT(*) FROM encadrant_camp 
    INNER JOIN encadrant ON encadrant_camp.niss_encadrant = encadrant.niss
    WHERE numero_dossier = 25  AND encadrant.brevet = TRUE " ;
    $operation = $pdo->prepare($sqlQuery);
    $operation->execute();
    $result = $operation ->fetch();  
    if(isset($result))return $result['COUNT(*)'];
}
function countExperienceBrevet(){
    include 'connection.php';
    $sqlQuery = " SELECT COUNT(*) FROM encadrant_camp 
    INNER JOIN encadrant ON encadrant_camp.niss_encadrant = encadrant.niss
    WHERE numero_dossier = 25  AND encadrant.experience = TRUE AND encadrant.brevet = TRUE" ;
    $operation = $pdo->prepare($sqlQuery);
    $operation->execute();
    $result = $operation ->fetch();  
    if(isset($result))return $result['COUNT(*)'];
}

?>

