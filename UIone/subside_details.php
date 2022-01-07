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
            <div class="col-auto">
                <?php
                if (isset($_SESSION['numDos'])) {
                    $sqlQuery = " SELECT date_demande, camp.denomination AS camp, camp.date_debut As debut, camp.date_fin AS fin, camp.frais_de_participation as frais, adresse.rue AS rue, adresse.numero_rue AS num_rue, adresse.code_postal as code_postal, adresse.commune AS commune
                    FROM demande_subside 
                        INNER JOIN camp ON demande_subside.numero_dossier=camp.numero_dossier
                        INNER JOIN adresse ON camp.id_adresse = adresse.id_adresse
                    WHERE demande_subside.numero_dossier= $_SESSION[numDos]";
                    $operation = $pdo->prepare($sqlQuery);
                    $operation->execute();
                    $data = $operation->fetch();

                    $sqlQuery = "SELECT niss, nom, prenom FROM enfant
                        INNER JOIN enfant_camp ON enfant.niss = enfant_camp.niss_enfant
                        WHERE enfant_camp.numero_dossier = $_SESSION[numDos]";
                    $operation = $pdo->prepare($sqlQuery);
                    $operation->execute();
                    $listeEnfants = $operation->fetchAll();

                    $sqlQuery = "SELECT niss, nom, prenom FROM encadrant
                        INNER JOIN encadrant_camp ON encadrant.niss = encadrant_camp.niss_encadrant
                        WHERE encadrant_camp.numero_dossier = $_SESSION[numDos]";
                    $operation = $pdo->prepare($sqlQuery);
                    $operation->execute();
                    $listeEncadrants = $operation->fetchAll();


                    if (countEnfant6() > 0) {
                        if (countEnfant() / countEncadrant() <= 12) $condition1 = true;
                        else $condition1 = false;
                    } else {
                        if (countEnfant() / countEncadrant() <= 8) $condition1 = true;
                        else $condition1 = false;
                    }
                    if (countBrevet() > 0) {
                        if (countEncadrant() / countBrevet() <= 3) $condition2 = true;
                        else $condition2 = false;
                    } else $condition2 = false;

                    if (countExperienceBrevet() > 0) $condition3 = true;
                    else $condition3 = false;
                }

                ?>
                <div class="jumbotron">
                    <h4>
                        <p>Informations relatives à la demande de subside</p>
                    </h4>
                    <p>
                    <h6>Numero de Dossier : <?php echo $_SESSION['numDos']; ?> </h6>
                    </p>
                    <hr>
                    <p> <strong>Date de dépot du dossier : </strong> <?php echo $data['date_demande']; ?> </p>
                    <p> <strong>Nombre d'enfants : </strong> <?php echo countEnfant(); ?></p>
                    <p> <strong>Nombre d'enfants de moins de 6 ans :</strong> <?php echo countEnfant6(); ?> </p>
                    <p> <strong>Condition d'encadrement de quantité : </strong> 
                        <?php   if ($condition1) echo "<span style='color: green ;' >Validé</span>";
                                else  echo "<span style='color: red ;' >Non validé</span>" 
                        ?> 
                    </p>
                    <p> <strong>Condition d'encadrement de qualité : </strong> <?php if ($condition2 and $condition3) echo "<span style='color: green ;'>Validé</span>";
                                                                                else  echo "<span style='color: red ;' >Non validé</span>" ?> </p>
                </div>


            </div>
            <div class="col"></div>
            <div class="col-auto">
                <div class="jumbotron">
                    <h4>
                        <p>Informations relatives à la déclaration de camp</p>
                    </h4>
                    <p>
                    <h6> Dénomination : <?php if (isset($data['camp'])) echo $data['camp']; ?> </h6>
                    </p>
                    <hr>
                    <p> <strong>Période: </strong> <?php if (null !== ($data['debut'] and $data['fin'])) echo " du $data[debut] au $data[fin]"; ?> </p>
                    <p> <strong>Nombre d'encadrants: </strong> <?php echo countEncadrant(); ?> </p>
                    <p> <strong>Frais de participation par enfant : </strong> <?php if (isset($data['frais'])) echo $data['frais'] . "€"; ?> </p>
                    <p> <strong>Adresse :</strong> <?php echo "$data[num_rue] $data[rue] - $data[code_postal] $data[commune]" ?> </p>
                    <p> <br></p> 
                </div>

            </div>
            <div class="col-1"></div>
        </div>
        <p></p>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-5">
                <ul class="list-group">
                    <?php
                    if (isset($listeEnfants)) {
                        foreach ($listeEnfants as $item) {
                            echo " <li class='list-group-item'>  $item[niss]  |  $item[nom]   $item[prenom] </li>";
                        };
                    }
                    ?>

                </ul>
            </div>
            <div class="col-auto"></div>
            <div class="col-5">
                <ul class="list-group">
                    <?php
                    if (isset($listeEncadrants)) {
                        foreach ($listeEncadrants as $item) {
                            echo " <li class='list-group-item'>  $item[niss]  |  $item[nom]   $item[prenom] </li>";
                        };
                    }
                    ?>
                </ul>
            </div>
            <div class="col-1"></div>
        </div>



        <div class="row" style="margin-top: 100px;">
            <div class="col-1"></div>
            <div class="col-1">
                <button class="btn btn-secondary"> <a href="./ui_one.php"> Retour </a> </button>
            </div>
            <div class="col-1"></div>
            <form action="../php/reponse_one.php" method="POST">
                <div class="form-row">
                    <div class="col-auto">
                        <button class="btn btn-success" name="octroi">Accepter</button>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="montant" id="montant" placeholder="Montant du subside" required>
                    </div>
                </div>
            </form>
            <div class="col-1"></div>
            <form action="../php/reponse_one.php" method="POST">
                <div class="form-row">
                    <div class="col-auto">
                         <button class="btn btn-danger" name="refus">refuser</button>
                    </div>
                    <div class="col-auto">
                        <textarea class="form-control" id="raison" name="raison" rows="3" style="width: 10cm;" placeholder="Raison du refus" required></textarea>
                    </div>
                </div>
            </form>
            <div class="col-1"></div>
        </div>
        <div class="row" style="margin-top:1cm;"></div>
    </div>
    <?php include '../jquery.php' ?>
</body>

</html>