<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP banque de donnée - appli web</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<?php
            $servername = 'localhost';
            $username = 'root';
            $password = 'root';
            
            //On établit la connexion
            $conn = new mysqli($servername, $username, $password);
            
            //On vérifie la connexion
            if($conn->connect_error){
                die('Erreur : ' .$conn->connect_error);
            }
            echo 'Connexion réussie';
        ?>
    


    <form method="post" action="name.php">
        <p><label for="name">What is tour name ? </label></p>
        <p><input type="text" name="name"> </p>
        <p> <input type="submit" value="Submit"></p>
    </form>
    






    
</body>
</html>