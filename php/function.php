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

function getAveragePrice( $id_federation){
    include 'connection.php';
    $sqlQuery = " SELECT AVG(frais_de_participation) AS avg
            FROM camp 
                INNER JOIN unite  ON camp.num_agrement_unite = unite.numero_agrement
                INNER JOIN federation_mouvement_jeunesse AS federation ON unite.id_federation_mouvement_jeunesse = federation.id
            WHERE federation.id = $id_federation" ;

    $operation = $pdo->prepare($sqlQuery);
    $operation->execute();
    $result = $operation ->fetch();  

    if(isset($result))return $result['avg'];
}
function countCamps( $id_federation){
    include 'connection.php';
    $sqlQuery = "SELECT COUNT(*) AS count
        FROM demande_subside
            INNER JOIN camp ON demande_subside.numero_dossier = camp.numero_dossier
            INNER JOIN unite  ON camp.num_agrement_unite = unite.numero_agrement
            INNER JOIN federation_mouvement_jeunesse AS federation ON unite.id_federation_mouvement_jeunesse = federation.id
        WHERE federation.id = $id_federation AND YEAR (demande_subside.date_demande) >= YEAR(NOW())-1" ;

    $operation = $pdo->prepare($sqlQuery);
    $operation->execute();
    $result = $operation ->fetch();  

    if(isset($result))return $result['count'];
}
function sumSubsides( $id_federation){
    include 'connection.php';
    $sqlQuery = " SELECT SUM(montant_subside) AS total
        FROM decision
            INNER JOIN demande_subside ON decision.numero_dossier = demande_subside.numero_dossier
            INNER JOIN camp ON decision.numero_dossier = camp.numero_dossier
            INNER JOIN unite  ON camp.num_agrement_unite = unite.numero_agrement
            INNER JOIN federation_mouvement_jeunesse AS federation ON unite.id_federation_mouvement_jeunesse = federation.id
        WHERE federation.id = $id_federation  AND YEAR (demande_subside.date_demande) >= YEAR(NOW())-1 " ;

    $operation = $pdo->prepare($sqlQuery);
    $operation->execute();
    $result = $operation ->fetch();  
    if(isset($result))return $result['total'];
}

?>

