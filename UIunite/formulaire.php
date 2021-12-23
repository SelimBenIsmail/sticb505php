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
                    <div class="col-1"></div>
                    <div class="col">
                        <h4 style="margin-top: 10px;">Déclaration du camp : </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-4">
                        <label for="Denomination">Dénomination du camp</label>
                        <input type="text" class="form-control" id="Denomination" name="Denomination" placeholder="Entrez le nom de votre unité">
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-2">
                        <label for="Denomination">Type de camp</label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="plaine">Plaine</option>
                            <option value="foret">Forêt</option>
                            <option value="campagne">Campagne</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <label for="frais">Frais de participation</label>
                        <input type="text" class="form-control" id="frais" name="frais" placeholder="€">
                    </div>


                </div>
                <p></p>

                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-2">
                        <label for="Denomination">Date de début</label>
                        <input type="text" class="form-control" id="debut" name="debut" placeholder=" jj-mm-aaaa">
                    </div>
                    <div class="col-2">
                        <label for="Denomination">Date de fin</label>
                        <input type="text" class="form-control" id="fin" name="fin" placeholder=" jj-mm-aaaa">
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-3">
                        <input class="form-check-input" type="checkbox" value="" id="undersix">
                        <span style="margin-left: 2%;"></span>
                        <label for="undersix">Présence d'enfant de moins de 6 ans </label>

                    </div>
                    <div class="col-3">
                        <input class="form-check-input" type="checkbox" value="" id="ebs">
                        <span style="margin-left: 2%;"></span>
                        <label for="ebs">Présence d'enfant à besoin spécifique </label>
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
                    <div class="col-1"></div>
                    <div class="col">
                        <h4 style="margin-top: 50px;">Encadrants : </h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
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
                                <tr>
                                    <td>91081634911</td>
                                    <td>Ben Ismail</td>
                                    <td>Selim</td>
                                    <td> Non</td>
                                    <td> Non</td>
                                    <td> <button class="btn btn-secondary btn-sm"> Supprimer </button> </td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" name="" id="" placeholder="Numero de registre Nat. ..."> </td>
                                    <td><input type="text" class="form-control" name="" id="" placeholder="Nom ..."></td>
                                    <td><input type="text" class="form-control" name="" id="" placeholder="Prénom ..."></td>
                                    <td><input type="text" class="form-control" name="" id="" placeholder=""></td>
                                    <td><input type="text" class="form-control" name="" id="" placeholder=""></td>
                                    <td><button class="btn btn-secondary btn-sm"> Ajouter </button> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10"></div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <p></p>
            </div>

            <p></p>

        </form>

        <div class="row">
            <div class="col-1"></div>
            <div class="col">
                <h4 style="margin-top: 50px;">Formulaire de subside pour l'ONE : </h4>
            </div>
            <div class="col-1"></div>
        </div>
        <p></p>

        <form>
            <div class="form-group">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-auto">
                        <div class="jumbotron">
                            <p class="lead"> <strong>Numero de Dossier : </strong> </p>
                            <p class="lead"> <strong>Nombre d'enfant : </strong> </p>
                            <p class="lead"> <strong>Nombre d'encadrants : </strong></p>
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
                                    <th scope="col">Numero d'urgence</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr *ngFor="let item of getDataEnfants()">
                                    <td>{{item.NumNat}}</td>
                                    <td>{{item.Nom}}</td>
                                    <td>{{item.Prenom}}</td>
                                    <td>{{item.DateNaissance}}</td>
                                    <td>{{item.NumeroCasUrgence}}</td>
                                    <td> <button class="btn btn-secondary btn-sm"> Supprimer </button> </td>
                                </tr>
                                <tr>
                                    <td> <input type="text" class="form-control" name="" id="" placeholder="Numero de registre Nat. ..."> </td>
                                    <td><input type="text" class="form-control" name="" id="" placeholder="Nom ..."></td>
                                    <td><input type="text" class="form-control" name="" id="" placeholder="Prénom ..."></td>
                                    <td><input type="text" class="form-control" name="" id="" placeholder="jj-mm-aaaa..."></td>
                                    <td><input type="text" class="form-control" name="" id="" placeholder="Numero d'urgence..."></td>
                                    <td> <button class="btn btn-secondary btn-sm"> Ajouter </button> </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10"></div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary"> <a href="./ui_unite.php">Submit</a></button>
                    </div>
                </div>
                <p></p>
                <div style="height: 1cm;"></div>
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