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

function countEnfant(){
    include 'connection.php';
    $sqlQuery = " SELECT COUNT(*) FROM enfant_camp WHERE numero_dossier = $_SESSION[numDos] " ;
    $operation = $pdo->prepare($sqlQuery);
    $operation->execute();
    $result = $operation ->fetch();  
    if(isset($result))return $result;
}

function countEncadrant(){
    include 'connection.php';
    $sqlQuery = " SELECT COUNT(*) FROM encadrant_camp WHERE numero_dossier = $_SESSION[numDos] " ;
    $operation = $pdo->prepare($sqlQuery);
    $operation->execute();
    $result = $operation ->fetch();  
    if(isset($result))return $result;
}

?>

