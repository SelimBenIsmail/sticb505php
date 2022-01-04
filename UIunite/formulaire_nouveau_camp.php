<?php session_start()?>
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
        <form action="../php/nouveau_camp.php" method="post">
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
                    <input type="text" class="form-control" id="debut" name="debut" placeholder=" jj-mm-aaaa" required>
                </div>
                <div class="col-2">
                    <label for="Denomination">Date de fin</label>
                    <input type="text" class="form-control" id="fin" name="fin" placeholder=" jj-mm-aaaa" required>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-3">
                    <input class="form-check-input" type="checkbox"  id="undersix"  value="TRUE" name="undersix">
                    <span style="margin-left: 2%;"></span>
                    <label for="undersix">Présence d'enfants de moins de 6 ans </label>

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
                    <label for="Commune">Commune</label>
                    <input type="text" class="form-control" id="Commune" name="Commune" placeholder="Commune">
                </div>
            </div>
            <p></p>

            <div class="row">
                <div class="col-8"></div>
                <div class="col">
                    <button type="submit" class="btn btn-primary" name="submitNewCamp">Submit</button>
                </div>
            </div>
        </form>
            <div style="height: 1cm;"></div>
        </form>
    </div>
    <?php include '../jquery.php' ?>
</body>

</html>