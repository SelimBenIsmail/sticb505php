<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <title> STIC-B-505 </title>
</head>
<?php include '../header.php' ?>

<body>
    <div class="container-fluid">

        <p></p>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-5">
                <?php
                if (isset($_SESSION['numDos'])) {
                    $sqlQuery = " SELECT date_demande, statut, camp.denomination AS camp, camp.date_debut As debut, camp.date_fin AS fin, camp.frais_de_participation as frais, adresse.rue AS rue, adresse.numero_rue AS num_rue, adresse.code_postal as code_postal, adresse.commune AS commune
                    FROM demande_subside 
                        INNER JOIN camp ON demande_subside.numero_dossier=camp.numero_dossier
                        INNER JOIN adresse ON camp.id_adresse = adresse.id_adresse
                    WHERE demande_subside.numero_dossier= $_SESSION[numDos]";
                    $operation = $pdo->prepare($sqlQuery);
                    $operation->execute();
                    $data = $operation->fetch();

                    $sqlQuery = " SELECT decision.*, agent_one.nom AS nom, agent_one.prenom AS prenom
                        FROM decision 
                            INNER JOIN agent_one ON decision.id_agent_traitant = agent_one.niss
                        WHERE numero_dossier = $_SESSION[numDos]";
                    $operation = $pdo->prepare($sqlQuery);
                    $operation->execute();
                    $result = $operation->fetch();

                
                }

                ?>
                <div class="jumbotron">
                    <h4>
                        <?php if (isset($data['camp'])) echo $data['camp']; ?>
                    </h4>
                <p>
                    <h6>Numero de Dossier : <?php echo $_SESSION['numDos']; ?> </h6>
                    <h6>Date de dépot du dossier :  <?php echo $data['date_demande']; ?></h6> 
                </p>
                    <hr>
                    <p> <strong>Période: </strong> <?php if (null !== ($data['debut'] and $data['fin'])) echo " du $data[debut] au $data[fin]"; ?> </p>
                    <p> <strong>Nombre d'encadrants: </strong> <?php echo countEncadrant(); ?> </p>
                    <p> <strong>Nombre d'enfants : </strong> <?php echo countEnfant(); ?> </p>
                    <p> <strong>Frais de participation par enfant : </strong> <?php if (isset($data['frais'])) echo $data['frais'] . "€"; ?> </p>
                    <p> <strong>Adresse :</strong> <?php echo "$data[num_rue] $data[rue] - $data[code_postal] $data[commune]" ?> </p>
                </div>

            </div>
            <div class="col-5">
                <div class="jumbotron">
                    <h4>
                        Réponse de l'ONE
                    </h4>
                    <h6> Statut : 
                        <?php 
                            if(!empty($result) and $result['statut']=="Accordé") echo " <span style='color:blue;'>$result[statut]</span>";
                            else if (!empty($result) and $result['statut']=='Refusé') echo " <span style='color:red;'>$result[statut]</span>";
                            else echo " <span style='color:grey;'> En attente de traitement </span>" ;
                        ?> 
                    </h6>
                    <?php if(!empty($result)) echo " <h6> Agent traitant : $result[nom] $result[prenom] </h6>";?>
                    <hr>

                    <?php 
                        if(!empty($result) and $result['statut']=="Accordé") echo " <p> Montant du subside accordé : $result[montant_subside]€ </p>";
                        else if(!empty($result) and $result['statut']=="Refusé") echo " <p> <strong>Motivation de la decision de refus :</strong> </p> $result[motivation_decision] ";
                    
                    ;?>

                </div>

            </div>
            <div class="col-1"></div>
        </div>
        <p></p>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-1">
                <button class="btn btn-secondary"> <a href="./ui_unite.php"> Retour </a> </button>
            </div>
        </div>
    </div>
    <?php include '../jquery.php' ?>
</body>

</html>