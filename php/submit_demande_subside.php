<?php
session_start();
include 'connection.php';
if(isset($_POST['submit_subside'])){

    $postDate = date("Y-m-d") ;
    $postStatut="Non traité";
    $postNumDos= $_SESSION['numDos'] ;

//foreach ($postData as $item) echo $item." ";
    $sqlQuery= "INSERT INTO demande_subside (numero_dossier,date_demande,statut)
        VALUES (:numero_dossier, :date_demande,:statut)";

    $insertData = $pdo->prepare($sqlQuery);
    $insertData->execute([
        'numero_dossier'=> "$postNumDos",
        'date_demande'=>"$postDate",
        'statut'=>"$postStatut"
    ]);

}

?>
<meta http-equiv="refresh" content="1; url= ../UIunite/ui_unite.php" /> 