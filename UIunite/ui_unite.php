<?php include_once '../php/session.php'; ?>
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
                <div class="jumbotron">
                    <?php
                    if (isset($_SESSION['userLogged'])) {
                        echo " <p class='lead'> <strong>Dénomination : </strong> $_SESSION[userUniteDenom]</p><p class='lead'> <strong>Numéro d'agrémentation : </strong> $_SESSION[userUniteNum] </p><p class='lead'> <strong>Fédération : </strong>  $_SESSION[userFedDenom] </p>";
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
                <?php
                    if (isset($_SESSION['userLogged'])) {
                        echo "<button class='btn btn-secondary'><a href='/php/stic-b-505/UIunite/unite_details.php'> Modifier les informations de contact </a> </button>";
                    }
                ?>
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
            <?php
            if (isset($_SESSION['userLogged'])){
                echo "<div><button class='btn btn-primary'><a href='formulaire_nouveau_camp.php'>Déclarer un camp</a> </button></div>";
            }
            ?>
            </div>
        </div>
        <p></p>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-auto">
                <ul class="list-group">
                    <?php
                    if (isset($_SESSION['userLogged'])){
                        $sqlQuery = "SELECT numero_dossier, date_declaration, denomination  FROM camp where num_agrement_unite = $_SESSION[userUniteNum] ";
                        $listeCamps = $pdo->prepare($sqlQuery);
                        $listeCamps->execute();
                        $result = $listeCamps->fetchAll();
                        foreach ($result as $item) {
                            echo "<li class='list-group-item'> 
                                <form action='../php/reponse_details.php' method='POST'>
                                    $item[date_declaration]  |  $item[numero_dossier]  |  $item[denomination]   <span style='margin-left:2cm;'> </span>     
                                        <button class='btn btn-secondary btn-sm' value='$item[numero_dossier]' name='details'> Voir</button> 
                                </form>
                            </li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <?php include '../jquery.php' ?>
</body>
</html>