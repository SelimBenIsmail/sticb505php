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
        <form>
            <div class="form-group">
                <p></p>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-4">
                        <label for="Denomination"> Adresse email </label>
                        <input type="email" class="form-control" id="mail" name="mail" >
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-4">
                        <label for="Denomination">Numéro de de téléphone</label>
                        <input type="text" class="form-control" id="NumAgrementation" name="NumAgrementation">
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-4">
                        <label for="Rue">Rue</label>
                        <input type="text" class="form-control" id="Rue" name="Rue" >
                    </div>
                    <div class="col-1">
                        <label for="Numeri">N°</label>
                        <input type="text" class="form-control" id="Numero" name="Numero" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-2">
                        <label for="CodePostal">Code postal</label>
                        <input type="text" class="form-control" id="CodePostal" name="CodePostal" >
                    </div>
                    <div class="col-3">
                        <label for="Ville">Ville</label>
                        <input type="text" class="form-control" id="Ville" name="Ville" >
                    </div>
                </div>
                <p></p>
            </div>
            <p></p>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-1">
                    <button type="submit" class="btn btn-success">Valider</button>
                </div>
                <div class="col-1">
                <button class="btn btn-primary"> <a href="ui_unite.php"> Retour </a> </button>
                </div>
            </div>
        </form>



    </div>
<?php include '../jquery.php'?>
</body>

</html>