<?php 
    $host = 'localhost';
    $username = 'root';
    $password = '';
    try
    {
        // On se connecte à MySQL
        $pdo = new PDO('mysql:host='.$host.';dbname=STICB505;charset=utf8', $username,$password);
        //echo '[ connection établie ]';
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
    }

?>