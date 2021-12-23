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
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a href="/php/stic-b-505/index.php"> <span class="navbar-brand mb-0 h1"> STIC-B505 </span></a>
            <span> <strong> Déclaration d'activité des centres de vacances et demande de subside auprès de l'ONE </strong> </span>
            <span> [ Utilisateur authentifié ]</span>
        </div>
    </nav>

</header>

<body>
    <div class="container-fluid">
        <form>
            <div class="form-group">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-4">
                        <label for="Denomination">Dénomination de l'unité </label>
                        <input type="text" class="form-control" id="Denomination" name="Denomination" placeholder="Entrez le nom de votre unité">
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-4">
                        <label for="Denomination">Numéro d'agrémentation</label>
                        <input type="text" class="form-control" id="NumAgrementation" name="NumAgrementation" placeholder="Entrez le numéro d'agrémentation de votre unité">
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-4">
                        <label for="Rue">Rue</label>
                        <input type="text" class="form-control" id="Rue" name="Rue" placeholder="Rue">
                    </div>
                    <div class="col-1">
                        <label for="Numeri">N°</label>
                        <input type="text" class="form-control" id="Numero" name="Numero" placeholder="Numero">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-2">
                        <label for="CodePostal">Code postal</label>
                        <input type="text" class="form-control" id="CodePostal" name="CodePostal" placeholder="Code postal">
                    </div>
                    <div class="col-3">
                        <label for="Ville">Ville</label>
                        <input type="text" class="form-control" id="Ville" name="Ville" placeholder="Ville">
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-4">
                        <label for="Denomination">Fédération</label>
                        <input type="text" class="form-control" id="Federation" name="Federation" placeholder="Entrez le nom de la fédération de votre unité">
                        <p></p>
                    </div>
                </div>
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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>