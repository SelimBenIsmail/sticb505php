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
<?php ?>


    <div class="container" style="margin-top: 1%;">
        <div class="row justify-content-md-center" style="margin-top: 3%;margin-bottom:3%;" >
            <div class="col-1"></div>
            <div class="col-auto">
                <h4 style="text-decoration:underline"> Analyse des données statistique de l'ONE</h4>
            </div>
            <div class="col-1"></div>
        </div>
        <div class="row justify-content-md-center">
           

            <div class="col-auto">
                <div class="jumbotron">
                    <h4>
                        Les scouts 
                        <?php $id_federation = 1 ;?>
                    </h4>
                    <hr>
                    <p> Nombre camps organisés cette année : <?php echo countCamps($id_federation) ?> </p>
                    <p> Frais moyen par personne : <?php echo number_format(getAveragePrice($id_federation),2,","," ")."€" ?></p>
                    <p> Total de subsides occtroyés cette année : <?php echo number_format(sumSubsides($id_federation),2,",", " ")."€" ?></p>
                    
                </div>
            </div>
            <div class="col-auto">
                <div class="jumbotron">
                    <h4>
                        Les guides
                        <?php $id_federation = 2 ;?>
                    </h4>
                    <hr>
                    <p> Nombre camps organisés cette année : <?php echo countCamps($id_federation) ?> </p>
                    <p> Frais moyen par personne : <?php echo number_format(getAveragePrice($id_federation),2,","," ")."€" ?></p>
                    <p> Total de subsides occtroyés cette année : <?php echo number_format(sumSubsides($id_federation),2,",", " ")."€" ?></p>
                    
                </div>
            </div>
            <div class="col-auto">
                <div class="jumbotron">
                    <h4>
                        Les Patros
                        <?php $id_federation = 3 ;?>
                    </h4>
                    <hr>
                    <p> Nombre camps organisés cette année : <?php echo countCamps($id_federation) ?> </p>
                    <p> Frais moyen par personne : <?php echo number_format(getAveragePrice($id_federation),2,","," ")."€" ?></p>
                    <p> Total de subsides occtroyés cette année : <?php echo number_format(sumSubsides($id_federation),2,",", " ")."€" ?></p>
                </div>
            </div>
        
       

            <div class="col-auto">
                <div class="jumbotron">
                    <h4>
                        Les Scouts et Guides pluralistes
                        <?php $id_federation = 4 ;?>
                    </h4>
                    <hr>
                    <p> Nombre camps organisés cette année : <?php echo countCamps($id_federation) ?> </p>
                    <p> Frais moyen par personne : <?php echo number_format(getAveragePrice($id_federation),2,","," ")."€" ?></p>
                    <p> Total de subsides occtroyés cette année : <?php echo number_format(sumSubsides($id_federation),2,",", " ")."€" ?></p>                
                </div>
            </div>
            <div class="col-auto">
                <div class="jumbotron">
                    <h4>
                        Les Faucons Rouges
                        <?php $id_federation = 5 ;?>
                    </h4>
                    <hr>
                    <p> Nombre camps organisés cette année : <?php echo countCamps($id_federation) ?> </p>
                    <p> Frais moyen par personne : <?php echo number_format(getAveragePrice($id_federation),2,","," ")."€" ?></p>
                    <p> Total de subsides occtroyés cette année : <?php echo number_format(sumSubsides($id_federation),2,",", " ")."€" ?></p>
                </div>
            </div>           
        </div>


        <div class="row" style="margin-top:1cm;margin-bottom:2cm;">
            <col-auto> <a href="ui_one.php"><button class="btn btn-secondary">Retour à l'interface de gestion des dossiers</button></a></col-auto>
        </div>
        <div class="row"></div>      
    </div>
    
    <?php include '../jquery.php' ?>
</body>

</html>