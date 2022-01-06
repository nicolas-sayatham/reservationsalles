<?php

$bdd = mysqli_connect('localhost','root','','reservationsalles');
mysqli_set_charset($bdd, 'utf8');

        
    if (isset ($_POST['Valider']))
    {
      
        if (!empty($_POST['login']) AND !empty($_POST['password']) AND !empty($_POST['password2']))
        {
           

            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);
            $password2 = htmlspecialchars($_POST['password2']);
        
            
            if( $password == $password2)
            {
                
                $ajoututilisateur = "INSERT INTO utilisateurs (login , password) VALUES ('$login','$password')";
                
                if (mysqli_query($bdd, $ajoututilisateur)) 
                {
                    
                    header('Location: connexion.php');
                    exit;
                }
            }
        }
        else 
        {
           
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

    <link rel="stylesheet" href="../reservationsalles/css/inscription.css">

     
    
    <title>Espace inscription</title>
</head>

<body>
    <div class="main_inscription">
        <header>
            <div class="box_header">
                <div class="box_lien">
                    <div><a href="./index.php">Accueil</a></div>
                </div>
            </div>
        </header>

            <div class = "main2_inscription">
                <div class="box_titre_inscription">
                    <h1>Inscrivez-vous !</h1>
                    <h2>Entrez les données demandées :</h2>
                    <p>Pour réserver une salle veuillez vous inscrire</p>
                </div>
                    <div class="big_box_form">
                        <div class="box_form">
                            <div class="box2_form">
                                
                                    <form method="POST" action="">

                                            <div>
                                            <label for="Login : "></label>
                                            <input type="text" name="login" placeholder="Votre login" size="25"/>
                                            </div>

                                            <div>
                                            <label for="Mot de passe : "></label>
                                            <input type="password" name="password" placeholder="Votre mot de passe" size="25"/>
                                            </div>

                                            <div>
                                            <label for="Confirmation mot de passe : "></label>
                                            <input type="password" name="password2" placeholder="Confirmation mot de passe" size="25"/>
                                            </div>


                                            <input type="submit" name="Valider" value="Valider" class="bouton_valider"/>
                                        
                                    </form>
                                
                            </div>         
                        </div>
                    </div>    
            </div>

                <footer>
                <div class="contact"><h3>© Copyright 2021 – THE ROOM</h3></div>
                </footer>
    </div>
</body>
</html>