<?php
session_start();


$con = mysqli_connect("localhost", "root", "", "reservationsalles");
mysqli_set_charset($con, "utf8");
$date = "SELECT * FROM reservations";
$query = mysqli_query($con, $date);
$result = mysqli_fetch_all($query);

// Mettre les dates en format FR
setlocale(LC_TIME, 'fr_FR.utf8', 'Fra');


$lundi = date('Y-m-d', strtotime('Monday'));
$mardi = date('Y-m-d', strtotime('Tuesday'));
$mercredi = date('Y-m-d', strtotime('Wednesday'));
$jeudi = date('Y-m-d', strtotime('Thursday'));
$vendredi = date('Y-m-d', strtotime('Friday'));

$week = array($lundi, $mardi, $mercredi, $jeudi, $vendredi);

// var_dump($week);



foreach ($result as $value) {
    $jour = date('Y-m-d', strtotime($value[3]));
    $h = date("H", strtotime($value[3]));
    var_dump($h);
}




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

    <header>
        <div class="box_header">
            <div class="box_lien">
                <div><a href="./index.php">Accueil</a></div>
            </div>
        </div>
    </header>

    <div class="box_titre_planning">

        <h1>Planning</h1>

    </div>

    <table>
        <thead>
            <tr>
                <th></th>
                <?php
                for ($i = 0; $i < 5; $i++) {
                    echo '<th>' . ucfirst(strftime("%A %d %B %G", strtotime('Monday this week +' . $i . 'days')));
                }
                ?>
            </tr>
        </thead>

        <tbody>
            <?php
            for ($j = 8; $j <= 19; $j++) {
                echo "<tr>";
                echo "<td>" . $j . ":00" . "</td>";

                for ($i = 0; isset($week[$i]); $i++) {
                    echo "<td>";

                    foreach ($result as $value) {
                        $jour = date('Y-m-d', strtotime($value[3]));
                        $h = date("H", strtotime($value[3]));



                        if ($h == $j && $jour == $week[$i]) {
                            echo  $value[1];
                        }
                    }
                }
                echo '</td>';
            }
            ?>
        </tbody>
    </table>









    <footer>
        <div class="contact">
            <h3>© Copyright 2021 – THE ROOM</h3>
        </div>
    </footer>

</body>

</html>