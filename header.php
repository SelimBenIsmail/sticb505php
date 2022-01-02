<?php
echo <<< END
    <header>
        <?php
        include_once '../php/function.php';
        include '../php/connection.php';
        ?>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a href="../index.php"> <span class="navbar-brand mb-0 h1"> STIC-B505 </span></a>
                <span> <strong> Déclaration d'activité des centres de vacances et demande de subside auprès de l'ONE </strong> </span>
                <span>
                    <?php
                    session_start();
                    if (isset($_SESSION['userLogged'])) echo "$_SESSION[userFname] $_SESSION[userName]";
                    else echo "Session vide";
                    ?>
                </span>
            </div>
        </nav>
    </header>

END;

?>