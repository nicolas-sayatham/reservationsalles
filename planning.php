<?php
session_start();

//Connexion à la BDD et relier les 2 table et afficher le tableau du résultat
$bdd = mysqli_connect("localhost", "root", "", "reservationsalles");
$query2 = "SELECT * FROM utilisateurs INNER JOIN reservations ON utilisateurs.id = reservations.id_utilisateur";
$query2 = mysqli_query($bdd, $query2);
$resultats = mysqli_fetch_all($query2, MYSQLI_ASSOC);
var_dump($resultats);

// Mettre les dates en format FR
setlocale(LC_TIME, 'fr_FR.utf8', 'Fra');

//Stockage des date de la semaine dans les variables 
$lundi = date('Y-m-d', strtotime('Monday'));
$mardi = date('Y-m-d', strtotime('Tuesday'));
$mercredi = date('Y-m-d', strtotime('Wednesday'));
$jeudi = date('Y-m-d', strtotime('Thursday'));
$vendredi = date('Y-m-d', strtotime('Friday'));

$week = array($lundi, $mardi, $mercredi, $jeudi, $vendredi);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@500&family=Roboto+Condensed&family=Teko:wght@500&family=Titillium+Web:ital@1&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../reservationsalles/css/planning.css">
    <title>Planning</title>
</head>


<body>
    <main>

        <header>

            <div><a href="./index.php">Accueil</a></div>

        </header>

        <div class="box_titre_planning">

            <h1>Planning</h1>

        </div>
        <div class="box_plan">

            <table>
                <thead>
                    <tr>
                        <th></th>
                        <?php
                        for ($i = 0; $i < 5; $i++) {
                            echo '<th>' . utf8_encode(strftime("%A %d %B %G", strtotime('Monday this week +' . $i . 'days')));
                        }
                        ?>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    for ($j = 8; $j <= 19; $j++) {
                        echo "<tr>";
                        echo "<td>" . $j . ":00" . "- " . ($j + 1) . ":00 </td>";

                        for ($i = 0; isset($week[$i]); $i++) {
                            echo "<td>";

                            foreach ($resultats as $resultat) {
                                $jour = date('Y-m-d', strtotime($resultat['debut']));
                                $h = date("H", strtotime($resultat['fin']));

                                if ($h == $j && $jour == $week[$i]) {
                                    echo  $resultat['login'];
                                }
                            }
                        }
                        echo '</td>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <footer>
            <div class="contact">
                <h3>© Copyright 2021 – THE ROOM</h3>
            </div>
        </footer>
    </main>

</body>

</html>