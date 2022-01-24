<?php

$bdd = mysqli_connect('localhost', 'root', '', 'reservationsalles') or die("Impossible de se connecter : " . mysqli_connect_error());
mysqli_set_charset($bdd, "utf8");
$req = "SELECT * FROM reservations";
$exec_req = mysqli_query($bdd, $req);
$reservations = mysqli_fetch_all($exec_req, MYSQLI_ASSOC);

// foreach ($reservations as $reservation) {

//     if (isset($_GET['id'])) {

//         echo '<table>';
//         echo '<td>' . $reservation['titre'] . '</td>';
//         echo '<td>' . $reservation['description'] . '</td>';
//         echo '<td>' . $reservation['debut'] . '</td>';
//         echo '<td>' . $reservation['fin'] . '</td>';
//     }
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../reservationsalles/css/reservation.css">

    <title>Reservation</title>
</head>

<body>
    <main>
        <header>


            <div class="box_header">

                <div class="box_titre1_index">
                    <h1>THE ROOM</h1>
                </div>
                <?php
                session_start();
                include 'header.php';
                ?>

            </div>
        </header>


        <form method="GET" action="">

            <div>
                <label for="ID event"></label>
                <input type="text" name="id" placeholder="Mettez le ID que vous souhaiter , pour voir les infos" size="50" />
            </div>


            <button type="submit">Valider</button>

        </form>
        <?php

        foreach ($reservations as $reservation) {

            echo '<table>';
            echo '<td>' . $reservation['id'] . '</td>';
            echo '</table>';
        }


        if (isset($_GET['id'])) {

            $id = $_GET['id'];



            $requete = "SELECT * FROM reservations WHERE id = $id";
            $exec_requete = mysqli_query($bdd, $requete);
            $results = mysqli_fetch_all($exec_requete, MYSQLI_ASSOC);


            foreach ($results as $result) {

                echo '<ul>';
                echo '<li>' . $result['titre'] . '</li>';
                echo '<li>' . $result['description'] . '</li>';
                echo '<li>Début événement '. $result['debut'] . '</li>';
                echo '<li>Fin événement '. $result['fin'] . '</li>';
                echo '</ul>';
            }
        }
        ?>




        <footer>
            <div class="contact">
                <h3>© Copyright 2021 – THE ROOM</h3>
            </div>
        </footer>

    </main>
</body>

</html>