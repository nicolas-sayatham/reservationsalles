<?php
session_start();

// On récupère les infos de la session en cours
$dataUser = $_SESSION['data'][0];
$id_user = $dataUser['id'];

var_dump($id_user);

//Conditions pour vérifier le post
if (isset($_POST['Valider'])) {

    //  Connexion à la BDD
    $bdd = mysqli_connect('localhost', 'root', '', 'reservationsalles') or die("Impossible de se connecter : " . mysqli_connect_error());


    if (!empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['datedebut']) && !empty($_POST['datedefin'])) {

        //  Conditions pour vérifier les Post


        //      Stockage des variable Post
        $titre = htmlspecialchars($_POST['titre']);
        $description = htmlspecialchars($_POST['description']);
        $datedebut = htmlspecialchars($_POST['datedebut']);
        $datedefin = htmlspecialchars($_POST['datedefin']);
        //      Requête d'insertion de donné dans la table reservations
        $addevent = "INSERT INTO reservations (titre , description , debut , fin , id_utilisateur) VALUES ('$titre','$description','$datedebut','$datedefin','$id_user')";

        if (mysqli_query($bdd, $addevent)) {

            header('Location: planning.php');
            exit;
        }
    } else {

        $erreur = "<p>Veuillez rentrer tous les champs</p>";
    }
}
ob_start();
?>


<div class="main2_reservation-form">
    <div class="box_titre_reservation-form">


        <h1>Reservation</h1>
        <p><span>Durée maximum de 1H par réservervation</span></p>
        <p>Veuillez préciser les informations de votre évènement :</p>

    </div>

    <form method="POST" action="">

        <div>
            <label for="Login : "></label>
            <input type="text" name="titre" placeholder="Titre de l'évènement" size="25" />
        </div>

        <div>
            <textarea name="description" cols="50" rows="10" placeholder="Description"></textarea>
        </div>

        <div>
            <label for="Date de début : "></label>
            <p>Date et Heure de début</p>
            <input type="datetime" name="datedebut" placeholder=" ex : 2022-01-21 08:00" size="25" />
        </div>

        <div>
            <label for="Date de fin : "></label>
            <p>Date et Heure de fin</p>
            <input type="datetime" name="datedefin" placeholder=" ex : 2022-01-21 09:00" size="25" />
        </div>

        <input type="submit" name="Valider" value="Reserver" class="bouton_valider" />

    </form>
</div>


<label for="Date de début : "></label>
<p>Jour de début</p>
<label type="select" name="datedebut" for="Choix du jour">Choix du Jour</label>
<select name="datedebut" id="Choix du jour" row="25">

    <?php
    for ($j = 0; $j <= 5; $j++) {
        echo "<option name='datedebut' value='jours'>" . date('Y-m-d', strtotime('Monday this week +' . $j . 'days')) . "</option>";
    }
    ?>
</select>

<label for="Date de fin : "></label>
<p>Jour de fin</p>
<label type="select" name="datedefin" for="Fin de réservation">Jour choisit</label>
<select name="datedefin" id="Fin de réservation" row="25">

    <?php
    for ($j = 0; $j <= 5; $j++) {
        echo "<option value='fin'>" . date('Y-m-d', strtotime('Monday this week +' . $j . 'days')) . "</option>";
    }
    ?>

</select>

<label for="Heure de début : "></label>
<p>Horaires de début</p>
<label type="select" name="datedebut" for="Heure du début">Heure de début</label>
<select name="datedebut" id="Heure de début : " row="25">

    <?php
    for ($i = 8; $i <= 19; $i++) {
        echo "<option name='datedebut' value='horaire'>$i</option>";
    }
    ?>

</select>
<label for="Heure de fin : "></label>
<p>Horaires</p>
<label name='datedefin' id="Heure de fin : " for="Heure du fin">Heure de fin</label>
<select name='datedefin' id="Heure de fin : " row="25">

    <?php for ($i = 8; $i <= 19; $i++) {
        echo "<option name='datedefin' value='horaire'>$i</option>";
    }
    ?>

</select></br>
<input type="submit" name="Valider" value="Reserver" class="bouton_valider" />

</form>
</div>

<?php
$content = ob_get_clean();
require_once 'template.php';
?>