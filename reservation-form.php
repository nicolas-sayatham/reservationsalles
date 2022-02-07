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
//  Conditions pour vérifier les Post
    if (!empty($_POST['titre']) and !empty($_POST['description']) and !empty($_POST['datedebut']) and !empty($_POST['datedefin'])) {

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

        $erreur = "<p>Veuillez rentrer tout les champs</p>";
    }
}

?>

<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../reservationsalles/css/index.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@500&family=Roboto+Condensed&family=Teko:wght@500&family=Titillium+Web:ital@1&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="../reservationsalles/css/reservation-form.css">

        <title>Espace reservation</title>
    </head>

    <body>
        <main>
            <header>
                <div><a href="./index.php">Accueil</a></div>
            </header>

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

            <footer>
                <div class="contact">
                    <h3>© Copyright 2021 – THE ROOM</h3>
                </div>
            </footer>
        </main>
    </body>

    </html>