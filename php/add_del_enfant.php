<?php
session_start();
include 'connection.php';

if(isset($_POST['add_enfant'])){
    $postData = $_POST;
    $postNiss=$postData['input_niss'];
    $postNom=$postData['input_nom'];
    $postPrenom=$postData['input_prenom'];
    $postDdn=$postData['input_ddn'];
    $postNumDos= $_SESSION['numDos'] ;
//foreach ($postData as $item) echo $item." ";

    $sqlQuery= "INSERT INTO enfant (niss,nom,prenom,date_naissance)
        VALUES (:niss,:nom,:prenom,:date_naissance)";
    $insertData = $pdo->prepare($sqlQuery);
    $insertData->execute([
        'niss'=> "$postNiss",
        'nom'=>"$postNom",
        'prenom'=>"$postPrenom",
        'date_naissance'=>"$postDdn"
    ]);

    $sqlQuery= "INSERT INTO enfant_camp 
    VALUES (:numero_dossier, :niss_enfant)";
    $insertData = $pdo->prepare($sqlQuery);
    $insertData->execute([
        'numero_dossier'=> "$postNumDos",
        'niss_enfant'=>"$postNiss"
    ]); 
}

if(isset($_POST['del_enfant'])){
    $id=$_POST['del_enfant'];
    $sqlQuery= "DELETE FROM enfant_camp WHERE niss_enfant= :id";
    $insertData = $pdo->prepare($sqlQuery);
    $insertData->execute([
        'id' => "$id"
    ]);
}


 
?>
<meta http-equiv="refresh" content="1; url=<?php echo $_SERVER["HTTP_REFERER"]  ; ?>" /> 