<?php
session_start();
include 'connection.php';
include 'function.php';

if(isset($_POST['update']))
{
    if(!empty($_POST['rue'] and $_POST['numRue'] and $_POST['codePostal'] and $_POST['commune'])) {
        
        $postRue=$_POST['rue'];
        $postNumRue=$_POST['numRue'];
        $postCodePostal=$_POST['codePostal'];
        $postCommune=$_POST['commune'];

        $sqlQuery= "INSERT INTO adresse (rue, numero_rue,code_postal,commune) 
        VALUES (:rue, :numero_rue,:code_postal,:commune)";

        $insertData = $pdo->prepare($sqlQuery);
        $insertData->execute([
            'rue'=> "$postRue",
            'numero_rue'=>"$postNumRue",
            'code_postal'=>"$postCodePostal",
            'commune'=>"$postCommune"
        ]);
        $_SESSION['userIdAdresse'] =getIdAdresse();
    }

    $sqlQuery= "UPDATE responsable_unite SET";
    $array = [];
    if(!empty($postMail =$_POST['email'])) {
        $sqlQuery .=" email = :email,";
        $array['email'] = "$postMail";
    }
    if(!empty($postNumTel =$_POST['numTel'])){
        $sqlQuery .=" telephone = :telephone,";
        $array['telephone'] = "$postNumTel";
    }
    $sqlQuery .=" id_adresse = :id_adresse";
    $array['id_adresse'] = "$_SESSION[userIdAdresse]";
    
    $sqlQuery .= " WHERE num_agrement_unite = $_SESSION[userUniteNum] ";
    $operation = $pdo->prepare($sqlQuery);
    $operation->execute($array);  

}

?>
<meta http-equiv="refresh" content="1; url= ../UIunite/ui_unite.php" /> 