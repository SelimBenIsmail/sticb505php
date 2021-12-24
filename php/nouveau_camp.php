<?php
    session_start();
    include 'connection.php';

    //if (isset($_POST['submitNewCamp']))
   // {

        $postData = $_POST;


        $postRue=$postData['Rue'];
        $postRueNum=$postData['Numero'];
        $postCodePostal=$postData['CodePostal'];
        $postCommune=$postData['Commune'];


        $postDenom=$postData['Denomination'];
        $postDateDeclaration= date("Y-m-d") ;
        $postFrais=$postData['frais'];
        $postDateDebut=$postData['debut'];
        $postDateFin=$postData['fin'];
        $postnumAgrementUnite=$_SESSION['userUniteNum'];

        if(isset($postData['undersix']))$postEnfantBasAge = 1;
        else $postEnfantBasAge=0;


        $sqlQuery= "INSERT INTO camp (denomination, date_declaration,frais_de_participation,date_debut,date_fin,presence_enfant_moins_6_ans,num_agrement_unite) 
            VALUES (:denomination, :date_declaration,:frais_de_participation,:date_debut,:date_fin,:presence_enfant_moins_6_ans,:num_agrement_unite)";

        $insertData = $pdo->prepare($sqlQuery);
        $insertData->execute([
            'denomination'=> "$postDenom",
            'date_declaration'=>"$postDateDeclaration",
            'frais_de_participation'=>"$postFrais",
            'date_debut'=>"$postDateDebut",
            'date_fin'=>"$postDateFin",
            'presence_enfant_moins_6_ans'=>"$postEnfantBasAge",
            'num_agrement_unite'=>"$postnumAgrementUnite"
        ]);

   // }	

?>
<meta http-equiv="refresh" content="1; url=<?php echo $_SERVER["HTTP_REFERER"]  ; ?>" />