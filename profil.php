<?php

session_start();



$dataUser = $_SESSION['data'][0];
$id_user = $dataUser['id'];


if (isset($_POST['Modifier'])) {

    if (!empty($_POST['login']) and !empty($_POST['password'])) {

        $login = $_POST['login'];
        $password = $_POST['password'];

        $bdd = mysqli_connect('localhost', 'root', '', 'reservationsalles') or die("Impossible de se connecter : " . mysqli_connect_error());

        $requete = "UPDATE utilisateurs SET login = '$login', password='$password' WHERE id = '$id_user'";
        $exec_requete = mysqli_query($bdd, $requete);

        header("Location: connexion.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/profil.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@500&family=Roboto+Condensed&family=Teko:wght@500&family=Titillium+Web:ital@1&display=swap" rel="stylesheet">
    <title>Profil</title>
</head>

<body>
    <div class="main_profil">
        <header>
            <div class="box_header">

                <div><a href="./index.php">Accueil</a></div>
                <div><a href="./deconnexion.php">Déconnexion</a></div>

            </div>
        </header>

        <div class="box_text">
            <h1>Bienvenue sur votre profil</h1>
            <ul>
                <li>
                    <p>Login : <?php echo $dataUser['login'] ?></p>
                </li>
                <li>
                    <p>Mot de passe : <?php echo $dataUser['password'] ?></p>
                </li>

            </ul>
        </div>



        <div class="big_box_form_profil">
            <div class="box2_form_profil">

                <form method="POST" action="">
                    <div class="txt1_profil">
                        <p>Pour modifier vos informations veuillez remplire les champs suivant : </p>
                    </div>

                    <label for="Login : "></label>
                    <input type="text" name="login" placeholder="<?php echo $dataUser['login'] ?>" size="25" />

                    <label for="Mot de passe : "></label>
                    <input type="password" name="password" placeholder="<?php echo $dataUser['password'] ?>" size="25" />

                    <input type="submit" name="Modifier" value="Modifier" class="btn_valider" />

                </form>
            </div>
        </div>

        <footer>
            <div class="contact">
                <h3>© Copyright 2021 – THE ROOM</h3>
            </div>
        </footer>
    </div>
</body>

</html>