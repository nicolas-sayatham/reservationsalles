<?php
session_start();

// $bdd = mysqli_connect("localhost", "root", "", "reservationsalles");
// mysqli_set_charset($bdd, "utf8");
// $date = "SELECT * FROM reservations";
// $query = mysqli_query($bdd, $date);
// $result = mysqli_fetch_all($query);

$bdd = mysqli_connect("localhost", "root", "", "reservationsalles");
$query2 = "SELECT *, date_format(fin, '%H') as heure, date_format(fin, '%Y-%m-%d') as jour FROM utilisateurs INNER JOIN reservations ON utilisateurs.id = reservations.id_utilisateur";
$query2 = mysqli_query($bdd, $query2);
$resultats = mysqli_fetch_all($query2, MYSQLI_ASSOC);

// Mettre les dates en format FR
setlocale(LC_TIME, 'fr_FR.utf8', 'Fra');

$lundi = date('Y-m-d', strtotime('Monday'));
$mardi = date('Y-m-d', strtotime('Tuesday'));
$mercredi = date('Y-m-d', strtotime('Wednesday'));
$jeudi = date('Y-m-d', strtotime('Thursday'));
$vendredi = date('Y-m-d', strtotime('Friday'));

$week = [$lundi, $mardi, $mercredi, $jeudi, $vendredi];

ob_start()
?>

<div class="box_titre_planning">

    <h1>Planning</h1>

</div>
<div class="box_plan">

    <table>
        <thead>
            <tr>
                <th>
                    <?php for ($i = 0; $i < 5; $i++) : ?>

                        <th>
                            <?= date('Y-m-d', strtotime('Monday this week +' . $i . 'days')) ?>
                        </th>
                        
                    <?php endfor; ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php for ($j = 8; $j <= 19; $j++) : ?>

                <tr>
                    <td><?= $j ?>:00-<?= $j + 1 ?>:00 </td>

                    <?php foreach ($week as $day) : ?>

                        <td>
                            <?php foreach ($resultats as $resultat) : ?>

                                <?php if ($resultat['heure'] == $j && $resultat['jour'] == $day) : ?>

                                    <p><?= $resultat['login'] ?></p>

                                    <a href="./reservation.php?id=<?= $resultat['id'] ?>">

                                        <p><?= $resultat['titre'] ?></p>

                                    </a>
                                <?php endif; ?>

                            <?php endforeach; ?>

                        </td>

                    <?php endforeach; ?>

                </tr>

            <?php endfor; ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
require_once 'template.php';
?>