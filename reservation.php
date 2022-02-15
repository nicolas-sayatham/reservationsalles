<?php
<<<<<<< HEAD
session_start();

=======
//Connexion à la BDD
>>>>>>> 099044fbede039400461287aec134a767b14df7c
$bdd = mysqli_connect('localhost', 'root', '', 'reservationsalles') or die("Impossible de se connecter : " . mysqli_connect_error());
mysqli_set_charset($bdd, "utf8");
$req = "SELECT * FROM reservations";
$exec_req = mysqli_query($bdd, $req);
$reservations = mysqli_fetch_all($exec_req, MYSQLI_ASSOC);

ob_start()
?>

<form method="GET" action="">
    <div>
        <select name="id" id="select-reservation">
            <option value="">Veuillez Choisir une réservation </option>

            <?php foreach ($reservations as $reservation) : ?>
                <option value="<?= $reservation['id'] ?>"><?= $reservation['titre'] . ' '. $reservation['id']?></option>
            <?php endforeach ?>

        </select>
    </div>
    <button type="submit">Valider</button>

</form>

<?php foreach ($reservations as $reservation) : ?>

<<<<<<< HEAD
    <table>
        <td>
            <p><?= $reservation['id'] ?> <?= $reservation['titre'] ?></p>
        </td>
    </table>

<?php endforeach; ?>
=======
        <?php
//      Boucle pour la réservations
        foreach ($reservations as $reservation) {
>>>>>>> 099044fbede039400461287aec134a767b14df7c

<?php if (isset($_GET['id'])) {

<<<<<<< HEAD
$id = $_GET['id'];

=======
//      Conditions pour vérifier la variable Get
        if (isset($_GET['id'])) {
>>>>>>> 099044fbede039400461287aec134a767b14df7c

//          Requête pour sélectionner la table réservations
$requete = "SELECT * FROM reservations WHERE id = $id";
$exec_requete = mysqli_query($bdd, $requete);
$results = mysqli_fetch_all($exec_requete, MYSQLI_ASSOC);

//          Boucle pour afficher les résultats
foreach ($results as $result) {

<<<<<<< HEAD
    echo '<ul>';
    echo '<li>' . $result['titre'] . '</li>';
    echo '<li>' . $result['description'] . '</li>';
    echo '<li>Début événement ' . $result['debut'] . '</li>';
    echo '<li>Fin événement ' . $result['fin'] . '</li>';
    echo '</ul>';
}
}
?>

<?php
$content = ob_get_clean();
require_once 'template.php';
?>
=======
//          Requête pour sélectionner la table réservations
            $requete = "SELECT * FROM reservations WHERE id = $id";
            $exec_requete = mysqli_query($bdd, $requete);
            $results = mysqli_fetch_all($exec_requete, MYSQLI_ASSOC);

//          Boucle pour afficher les résultats
            foreach ($results as $result) {

                echo '<ul>';
                echo '<li>' . $result['titre'] . '</li>';
                echo '<li>' . $result['description'] . '</li>';
                echo '<li>Début événement ' . $result['debut'] . '</li>';
                echo '<li>Fin événement ' . $result['fin'] . '</li>';
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
>>>>>>> 099044fbede039400461287aec134a767b14df7c
