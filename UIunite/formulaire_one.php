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

<?php include '../header.php'; ?>

<body>
    <div class="container-fluid">

        <div class="row">
            <div class="col-1"></div>
            <div class="col">
                <h4 style="margin-top: 50px;">Formulaire de subside pour l'ONE : </h4>
            </div>
            <div class="col-1"></div>
        </div>
        <p></p>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-auto">
                <div class="jumbotron">
                    <p class="lead"> <strong>Numero de Dossier : </strong> <?php echo $_SESSION['numDos'] ?> </p>
                    <p class="lead"> <strong>Nombre d'enfant : </strong> <?php echo countEnfant() ?></p>
                    <p class="lead"> <strong>Nombre d'encadrants : </strong> <?php echo countEncadrant() ?></p>
                </div>
            </div>
        </div>
        <p></p>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">N° Registre Nat.</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Date de naissance</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['userLogged'])) {
                            $sqlQuery = "SELECT enfant.niss AS niss, enfant.nom AS nom, enfant.prenom AS prenom, enfant.date_naissance AS ddn
                                FROM enfant_camp 
                                INNER JOIN enfant ON enfant_camp.niss_enfant = enfant.niss
                                INNER JOIN camp ON enfant_camp.numero_dossier = camp.numero_dossier
                                WHERE enfant_camp.numero_dossier = $_SESSION[numDos]";
                            $list = $pdo->prepare($sqlQuery);
                            $list->execute();
                            $result = $list->fetchAll();
                            foreach ($result as $item) {
                                echo "<tr>
                                        <form action='../php/add_del_enfant.php' method='POST'> 
                                            <td> $item[niss] </td> 
                                            <td> $item[nom] </td> 
                                            <td> $item[prenom] </td> 
                                            <td> $item[ddn] </td> 
                                            <td> <button  class='btn btn-secondary btn-sm' name='del_enfant' value='$item[niss]'> Supprimer </button> </td>
                                        </form>
                                    </tr>";
                            }
                        }
                        ?>
                        <tr>
                            <form action="../php/add_del_enfant.php" method="POST">
                                <td> <input type="text" class="form-control" name="input_niss" id="input_niss" placeholder="NISS..."> </td>
                                <td><input type="text" class="form-control" name="input_nom" id="input_nom" placeholder="Nom ..."></td>
                                <td><input type="text" class="form-control" name="input_prenom" id="input_prenom" placeholder="Prénom ..."></td>
                                <td><input type="text" class="form-control" name="input_ddn" id="input_ddn" placeholder="aaaa-mm-jj..."></td>
                                <td> <button class="btn btn-secondary btn-sm" name="add_enfant"> Ajouter </button> </td>
                            </form>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-10"></div>
            <form action="../php/submit_demande_subside.php" method="POST">
                <div class="col">
                    <button type="submit" class="btn btn-primary" name="submit_subside">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <?php include '../jquery.php' ?>
</body>

</html>