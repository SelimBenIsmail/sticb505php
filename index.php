<?php 
if(session_id()){
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title> STIC-B-505 </title>
</head>
<header>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a href="/stic-b-505/index.php"> <span class="navbar-brand mb-0 h1"> STIC-B505 </span></a>
            <span> <strong> Déclaration d'activité des centres de vacances et demande de subside auprès de l'ONE </strong> </span>
            <span>
                <?php include './php/connection.php'; ?>
            </span>
        </div>
    </nav>

</header>

<body>

    <div class="container" style="margin-top:10em;">
        <div class="row justify-content-center">
            <div class="col-3">
                <form action="UIunite/ui_unite.php" method="post">
                    <div class="form-group">
                        <label for="Denomination"> Connexion responsable d'unité </label>
                        <select class="form-select" name="uniteLogIn" >
                            <?php
                            $sqlQuery = 'SELECT niss, nom, prenom FROM responsable_unite ORDER BY num_agrement_unite';
                            $responsablesUnite = $pdo->prepare($sqlQuery);
                            $responsablesUnite->execute();
                            $result = $responsablesUnite->fetchAll();
                            echo "<option selected> </option>";
                            foreach ($result as $item) {
                                echo "<option value='$item[niss]'> $item[nom]" . " " . "$item[prenom] </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-primary"> login </button> 
                </form>
            </div>


            <div class="col-2"></div>
            <div class="col-2">
                <form action="UIone/ui_one.php" method="post">
                    <div class="form-group">
                        <label for="Denomination"> Connexion agent ONE </label>
                        <select class="form-select" name="oneLogIn">
                            <?php
                            $sqlQuery = 'SELECT niss, nom, prenom FROM agent_one ORDER BY attribution';
                            $agentsOne = $pdo->prepare($sqlQuery);
                            $agentsOne->execute();
                            $result = $agentsOne->fetchAll();
                            echo "<option selected> </option>";
                            foreach ($result as $item) {
                                echo "<option value='$item[niss]'> $item[nom]" . " " . "$item[prenom] </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-primary"> login </button>
                </form>
            </div>
        </div>
    </div>
    
    <?php include './jquery.php' ?>

    </body>
<footer>
    <div style="padding-left:10px;"> <small><em> Ben Ismail Selim, Manfroy David</em> </small></div>
    <div> <small><em> Travail réalisé dans le cadre du cours de Conception et gestion de banques de données, Projet 2021-2022 </em> </small></div>
    <div style="padding-right:10px;"> <small><em> Université Libre de Bruxelles</em> </small> </div>
</footer>

</html>