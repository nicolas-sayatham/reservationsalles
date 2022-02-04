<?php

if (isset($_POST['Valider'])) {

    // Si le login et le mdp est entré
    if (!empty($_POST['login'] && !empty($_POST['mdp']))) {

        $bdd = mysqli_connect('localhost', 'root', '', 'reservationsalles') or die("Impossible de se connecter : " . mysqli_connect_error());

        // Requête SELECT avec un WHERE du login égal au login inséré et password égal au password insérer pour afficher la l'entrée qui correspond a l'utilisateur 
        // Renvoie un array vide si l'utilisateur n'existe pas 
        $requete = ' SELECT * FROM utilisateurs WHERE login = "' . $_POST['login'] . '" AND password = "' . $_POST['mdp'] . '" ';
        $exec_requete = mysqli_query($bdd, $requete);
        $rep = mysqli_fetch_all($exec_requete, MYSQLI_ASSOC);

        // Si l'array n'est pas vide donc si l'utilisateur est présent dans la BDD 
        if (!empty($rep)) {
            session_start();

        //si connexion alors je redirige vers la page de profile 
            header('Location: profil.php');
            exit;
        }

        // SI array vide alors aucun utilisateur 

        else {

            $erreur = "Aucun utilisateur";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <link rel="stylesheet" href="./css/connexion.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@500&family=Roboto+Condensed&family=Teko:wght@500&family=Titillium+Web:ital@1&display=swap" rel="stylesheet">

</head>

<body>
    <main>
        <div class="main_connex">
            <header>
                <div class="box_header">
                    <div class="box_lien">
                        <div><a href="./index.php">Accueil</a></div>
                    </div>
                </div>
            </header>
            
                <div class="main2_connex">
                    <div class="box_titre_connex">
                        <h1>Connexion</h1>
                        <h2>Entrez vos identifiants :</h2>
                        <p>Pour réserver une salle veuillez vous connecter</p>
                    </div>
                    <div class="big_box_form_connex">
                        <div class="box_form_connex">
                            <div class="box2_form_connex">

                                <form method="POST" action="">

                                    <div>
                                        <label for="Login : "></label>
                                        <input type="text" name="login" placeholder="Votre login" size="25" />
                                    </div>

                                    <div>
                                        <label for="Mot de passe : "></label>
                                        <input type="password" name="mdp" placeholder="Votre mot de passe" size="25" />
                                    </div>

                                    <input type="submit" name="Valider" value="Connexion" class="bouton_valider" />

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="box_erreur">
                    <?php
                    if (isset($erreur)) {
                        echo '<p>' . $erreur = "Aucun utilisateur" . '</p>';
                    }
                    ?>
                </div>

                <footer>
                    <div class="contact">
                        <h3>© Copyright 2021 – THE ROOM</h3>
                    </div>
                </footer>

        </div>
    </main>
</body>

</html>