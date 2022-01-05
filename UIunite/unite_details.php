<?php session_start(); ?>
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

<?php
    $sqlQuery = "SELECT email, telephone, adresse.rue AS rue, adresse.numero_rue AS numero_rue, adresse.code_postal AS code_postal, adresse.commune As commune
    FROM responsable_unite 
    INNER JOIN adresse ON responsable_unite.id_adresse = adresse.id_adresse 
    WHERE niss = $_SESSION[userLogged]" ;
    $operation = $pdo->prepare($sqlQuery);
    $operation->execute();
    $result = $operation ->fetch(); 

?>
    <div class="container-fluid">
        <form action="../php/update_unite_details.php" method="POST">
            <div class="form-group">
                <p></p>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-4">
                        <label for="email"> Adresse email </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder=" <?php echo $result['email']?>" >
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-4">
                        <label for="numTel">Numéro de de téléphone</label>
                        <input type="text" class="form-control" id="numTel" name="numTel" placeholder=" <?php echo $result['telephone']?>">
                        
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-5"> <hr></div>
                </div>

                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-4">
                        <label for="rue">Rue</label>
                        <input type="text" class="form-control" id="rue" name="rue" placeholder=" <?php echo $result['rue']?>">
                    </div>
                    <div class="col-1">
                        <label for="numRue">N°</label>
                        <input type="text" class="form-control" id="numRue" name="numRue" placeholder=" <?php echo $result['numero_rue']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-2">
                        <label for="codePostal">Code postal</label>
                        <input type="text" class="form-control" id="codePostal" name="codePostal" placeholder=" <?php echo $result['code_postal']?>">
                    </div>
                    <div class="col-3">
                        <label for="commune">Commune</label>
                        <input type="text" class="form-control" id="commune" name="commune" placeholder=" <?php echo $result['commune']?>">
                    </div>
                </div>
                <p></p>
            </div>
            <p></p>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-1">
                    <a href="ui_unite.php"> <button class="btn btn-primary">  Retour </button></a>
                </div>
                <div class="col-3"></div>
                <div class="col-1">
                    <button type="submit" class="btn btn-success" name="update">Valider</button>
                </div>
                
                
            </div>
        </form>



    </div>
    <?php include '../jquery.php'; ?>
</body>

</html>