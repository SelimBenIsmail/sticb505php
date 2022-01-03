<?php 
session_start();
include 'connection.php';
if(isset($_POST['add_encadrant'])){

    $postData = $_POST;
    $postNiss=$postData['input_niss'];
    $postNom=$postData['input_nom'];
    $postPrenom=$postData['input_prenom'];
    $postData['input_brevet']=="TRUE" ? $postBrevet= 1 : $postBrevet=0; 
    $postData['input_experience']=="TRUE" ? $postExperience= 1 : $postExperience=0;
    $postNumDos= $_SESSION['numDos'] ;

//foreach ($postData as $item) echo $item." ";
    $sqlQuery= "INSERT INTO encadrant (niss,nom,prenom,brevet,experience)
        VALUES (:niss, :nom,:prenom,:brevet,:experience)";

    $insertData = $pdo->prepare($sqlQuery);
    $insertData->execute([
        'niss'=> "$postNiss",
        'nom'=>"$postNom",
        'prenom'=>"$postPrenom",
        'brevet'=>"$postBrevet",
        'experience'=>"$postExperience"
    ]);

    $sqlQuery= "INSERT INTO encadrant_camp 
    VALUES (:numero_dossier, :niss_encadrant)";

    $insertData = $pdo->prepare($sqlQuery);
    $insertData->execute([
        'numero_dossier'=> "$postNumDos",
        'niss_encadrant'=>"$postNiss"
    ]);
}
/*
if(isset($_POST['del_encadrant'])){
    
}
*/

?>
<meta http-equiv="refresh" content="1; url=<?php echo $_SERVER["HTTP_REFERER"]  ; ?>" /> 