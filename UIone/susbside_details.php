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

        <p></p>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-auto">
                <div class="jumbotron">
                    <h4>
                        <p> informations relatives à la demande de subside</p>
                    </h4>
                    <p> <strong>Numero de Dossier : </strong> </p>
                    <p> <strong>Nombre d'enfant : </strong> </p>
                    <p> <strong>Nombre d'encadrants : </strong></p>
                </div>
                <p></p>
                <ul class="list-group">
                    <li class="list-group-item" *ngFor="let item of getDataEnfants()">
                        {{item.NumNat}} {{item.Nom}} {{item.Prenom}}
                    </li>
                </ul>
            </div>
            <div class="col"></div>
            <div class="col-auto">
                <div class="jumbotron">
                    <h4>
                        <p> informations relatives à la déclaration de camp</p>
                    </h4>
                    <p> <strong>Dénomination : </strong> </p>
                    <p> <strong>Période: </strong> </p>
                    <p> <strong>Type de camps : </strong></p>
                    <p> <strong>Numero de Dossier : </strong> </p>
                    <p> <strong>Nombre d'enfant : </strong> </p>
                    <p> <strong>Nombre d'encadrants : </strong></p>
                </div>
                <p></p>

                <ul class="list-group">
                    <li class="list-group-item" *ngFor="let item of getDataEncadrants()">
                        {{item.NumNat}} {{item.Nom}} {{item.Prenom}}
                    </li>
                </ul>
            </div>
            <div class="col-1"></div>
        </div>
        <p></p>
        <div class="row" style="margin-top: 100px;">
            <div class="col-1"></div>
            <div class="col-1">
                <button class="btn btn-secondary"> <a href="../ui-one/"> Retour </a> </button>
            </div>
            <div class="col-2">
                <form >
                    <button class="btn btn-success">Accepter</button>
                    <div class="form-group">
                        <label for="montant"> Montant du subside :</label>
                        <input type="text" class="form-control" id="montant">
                    </div>
                </form>
            </div>
            <div class="col"></div>
            <div class="col-4">
                <form >
                    <button class="btn btn-danger">refuser</button>
                    <p></p>
                    <div class="form-group">
                        <label for="raison"> Raison du refus :</label>
                        <textarea class="form-control" id="raison" rows="3"></textarea>
                    </div>
                </form>
                <p></p>
            </div>
            <div class="col-1"></div>
        </div>




    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>