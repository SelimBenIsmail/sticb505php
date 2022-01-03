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
        <?php getNumDos() ?>
        <div class="row">
            <div class="col-1"></div>
            <div class="col">
                <h4 style="margin-top: 50px;">Encadrants : </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <form action="../php/add_del_encadrant.php" method="POST">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">N° Registre Nat.</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Possession de brevet</th>
                                <th scope="col">Expérience</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION['userLogged'])) {
                                $sqlQuery = "SELECT encadrant.niss AS niss, 
                                    encadrant.nom AS nom, encadrant.prenom AS prenom, 
                                    encadrant.brevet AS brevet, 
                                    encadrant.experience AS experience
                                    FROM encadrant_camp
                                    INNER JOIN encadrant ON encadrant_camp.niss_encadrant = encadrant.niss
                                    INNER JOIN camp ON encadrant_camp.numero_dossier = camp.numero_dossier
                                    WHERE encadrant_camp.numero_dossier = $_SESSION[numDos]";
                                $list = $pdo->prepare($sqlQuery);
                                $list->execute();
                                $result = $list->fetchAll();
                                foreach ($result as $item) {
                                    echo "<tr>
                                    <td> $item[niss] </td> 
                                    <td> $item[nom] </td> 
                                    <td> $item[prenom] </td> 
                                    <td> $item[brevet] </td> 
                                    <td> $item[experience] </td>  
                                    </tr>";
                                }
                            }
                            ?>
                            <tr>

                                <td><input type="text" class="form-control" name="input_niss" id="input_niss" placeholder="NISS ..."></td>
                                <td><input type="text" class="form-control" name="input_nom" id="input_nom" placeholder="Nom ..."></td>
                                <td><input type="text" class="form-control" name="input_prenom" id="input_prenom" placeholder="Prénom ..."></td>
                                <td>
                                    <select type="text" class="form-select form-select-lg mb-3" name="input_brevet" id="input_brevet">
                                        <option selected value="FALSE"> Non </option>
                                        <option value="TRUE"> Oui </option>
                                    </select>
                                </td>
                                <td>
                                    <select type="text" class="form-select form-select-lg mb-3" name="input_experience" id="input_experience">
                                        <option selected value="FALSE"> Non </option>
                                        <option value="TRUE"> Oui </option>
                                    </select>
                                </td>
                                <td> <button class="btn btn-secondary btn-sm" name="add_encadrant"> Ajouter </button></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>


        </div>
    </div>
    <div class="row">
        <div class="col-10"></div>
        <div class="col">
            <a href="formulaire_one.php"> <button type="submit" class="btn btn-primary" name="submitEncadrants">Submit</button></a>
        </div>
    </div>
    </form>
    </div>
    <?php include '../jquery.php' ?>
</body>

</html>