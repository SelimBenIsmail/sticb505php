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
            <a href="../index.php"> <span class="navbar-brand mb-0 h1"> STIC-B505 </span></a>
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
            <div class="col-4">
                <h4>Liste des demandes de subside :</h4>
            </div>
        </div>
        <p></p>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-auto">
                <ul class="list-group">
                    <a href="./susbside_details.php">
                        <li class="list-group-item" *ngFor="let item of getDataSubside()">
                            <h5> {{item.NumDossier}} | {{item.DateDemande}} | {{item.Statut}} </h5>
                            <p></p>
                        </li>
                    </a>
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