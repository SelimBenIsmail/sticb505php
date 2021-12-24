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
<header>
    <?php
    include_once '../php/function.php';
    session_start();
    include '../php/connection.php';
    ?>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a href="../index.php"> <span class="navbar-brand mb-0 h1"> STIC-B505 </span></a>
            <span> <strong> Déclaration d'activité des centres de vacances et demande de subside auprès de l'ONE </strong> </span>
            <span>
                <?php
                include_once '../php/session.php';
                if (isset($_SESSION['userLogged'])) {
                    echo getName("$_SESSION[userLogged]", "responsable_unite");
                } else echo "Session vide";
                ?>
            </span>
        </div>
    </nav>

</header>

<body>
    <div class="container-fluid">
        <p></p>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-auto">
                <div class="jumbotron">
                    <?php
                    if (isset($_SESSION['userLogged'])) {

                        $sqlQuery = "SELECT numero_agrement, denomination,id_federation_mouvement_jeunesse FROM unite WHERE numero_agrement = (
                            SELECT num_agrement_unite FROM responsable_unite WHERE niss = $_SESSION[userLogged]) ";
                        $infoUnite = $pdo->prepare($sqlQuery);
                        $infoUnite->execute();
                        $result = $infoUnite->fetch();
                        $_SESSION['userUniteDenomination']=$result['denomination'];
                        $_SESSION['userUniteNum']=$result['numero_agrement'];
                        $sqlQuery = "SELECT denomination FROM federation_mouvement_jeunesse WHERE id = $result[id_federation_mouvement_jeunesse] ";
                        $infoUnite = $pdo->prepare($sqlQuery);
                        $infoUnite->execute();
                        $result = $infoUnite->fetch();
                        $_SESSION['userFederationDenomination']=$result['denomination'];
                        echo " <p class='lead'> <strong>Dénomination : </strong> $_SESSION[userUniteDenomination]</p><p class='lead'> <strong>Numéro d'agrémentation : </strong> $_SESSION[userUniteNum] </p><p class='lead'> <strong>Fédération : </strong>  $_SESSION[userFederationDenomination] </p>";
                    }
                    ?>

                </div>
            </div>
        </div>
        <p></p>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-3">
                <div>
                    <button class="btn btn-secondary"><a href="/php/stic-b-505/UIunite/unite_details.php " disable>Modifier les informations de l'unité</a> </button>
                </div>
            </div>
        </div>
        <p></p>
        <div class="row">
            <div class="col-1"></div>
            <div class="col">
                <hr>
            </div>
            <div class="col-1"></div>
        </div>
        <p></p>
        <div class="row">
            <div class="col-1"></div>
            <div class="col">
                <div>
                    <button class="btn btn-primary"><a href="formulaire.php">Déclarer un camp</a> </button>
                </div>
            </div>
        </div>
        <p></p>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-auto">
                <ul class="list-group">

                    <?php
                    $sqlQuery = "SELECT numero_dossier, date_declaration, denomination  FROM camp where num_agrement_unite = $_SESSION[userUniteNum] ";
                    $listeCamps = $pdo->prepare($sqlQuery);
                    $listeCamps->execute();
                    $result = $listeCamps->fetchAll();
                    foreach ($result as $item) {
                        //echo " <li class='list-group-item'> $_SESSION[userUniteNum] </li>";
                        echo "<li class='list-group-item'>" . $item['numero_dossier'] . " | " . $item['date_declaration'] . " | " . $item['denomination'] . "<span style='margin-left: 2cm;'></span> <button class='btn btn-secondary btn-sm'> <a href='./reponse.php'>Voir</a></button> </li>";
                        
                    }

                    ?>
                </ul>
            </div>
        </div>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>