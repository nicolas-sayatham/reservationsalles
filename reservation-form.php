<?php
session_start();

// On récupère les infos de la session en cours
$dataUser = $_SESSION['data'][0];
$id_user = $dataUser['id'];

var_dump($id_user);


if (isset($_POST['Valider'])) {


    $bdd = mysqli_connect('localhost', 'root', '', 'reservationsalles') or die("Impossible de se connecter : " . mysqli_connect_error());

    if (!empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['datedebut']) && !empty($_POST['datedefin'])) {


        $titre = htmlspecialchars($_POST['titre']);
        $description = htmlspecialchars($_POST['description']);
        $datedebut = htmlspecialchars($_POST['datedebut']);
        $datedefin = htmlspecialchars($_POST['datedefin']);

        $addevent = "INSERT INTO reservations (titre , description , debut , fin , id_utilisateur) VALUES ('$titre','$description','$datedebut','$datedefin','$id_user')";

        if (mysqli_query($bdd, $addevent)) {

            header('Location: planning.php');
            exit;
        }
    } else {

        $erreur = "<p>Veuillez rentrer tout les champs</p>";
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

<?php
$content = ob_get_clean();
require_once 'template.php';
?>