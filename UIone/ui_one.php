<?php include '../php/session.php' ?>
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
            <div class="col-4">
                <h4>Liste des demandes de subside :</h4>
            </div>
        </div>
        <p></p>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-auto">
                <ul class="list-group">
                    <?php
                        if (isset($_SESSION['userLogged'])) {                           
                            $sqlQuery = " SELECT demande_subside.numero_dossier AS num_dos, date_demande, statut
                            FROM demande_subside
                            INNER JOIN camp ON demande_subside.numero_dossier = camp.numero_dossier
                            INNER JOIN unite ON camp.num_agrement_unite = unite.numero_agrement
                            INNER JOIN federation_mouvement_jeunesse ON unite.id_federation_mouvement_jeunesse = federation_mouvement_jeunesse.id 
                            INNER JOIN agent_one ON federation_mouvement_jeunesse.id =agent_one.attribution
                            WHERE niss = $_SESSION[userLogged]";
                            $list = $pdo->prepare($sqlQuery);
                            $list->execute();
                            $result = $list->fetchAll();
                            foreach ($result as $item) 
                                echo " <form action='../php/details.php' method='POST'> 
                                    <li class='list-group-item'>
                                        <button class='btn btn-outline-primary' value='$item[num_dos]' name='details'>" . $item['num_dos'] . " | " . $item['date_demande'] . " | " . $item['statut']." </button>
                                    </li> 
                                </form>";                                
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <?php include '../jquery.php' ?>
</body>

</html>
