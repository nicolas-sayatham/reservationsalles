<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../reservationsalles/css/index.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@500&family=Roboto+Condensed&family=Teko:wght@500&family=Titillium+Web:ital@1&display=swap" rel="stylesheet"> 

    <title>THE ROOM</title>
</head>
<body>
    <div class="main_index">
    
        <header>
            <div class="box_header">

                <div class="box_titre1_index"><h1>THE ROOM</h1></div>
                <?php
                    session_start();
                     include 'header.php'
                ?>
                
                </div>
        </header>

            <div class="box1_index">
                <div class="box_img1"></div>
                    <div class="box_titre2_index"><p>Meeting ROOM SOLUTION</p></div>
            </div>

            <div class="box1_txt_index">
                <div class="titre3_index">
                    <h2>OPTIMISER L’UTILISATION DE VOS SALLES DE REUNION</h2>
                </div>
                    <div class="small_box_txt1">
                        <div class="txt1_index">
                            <p>ROOM est la réponse à toutes vos questions en ce qui concerne l’utilisation et la gestion efficaces de vos salles de réunion.
                                Grâce à nos solutions, vous éliminez les problèmes de réservation et augmentez la satisfaction des employés.
                                Nos outils d’analyses vous aideront à interpréter et à optimiser l’utilisation de vos espaces de collaboration.</p>
                        </div>
                    </div>
            </div>
            
            <div class="box2_index">
                <div class="box_img2"><img src="../reservationsalles/image/img2_index.jpg" alt="pc working" height = 400px width = 500px></div>
                    
                        <div class="txt2_index">
                                <h2>La bonne information au bon moment</h2>
                                <p>La recherche d’une salle de réunion adéquate peut être la source d’une perte considérable de temps et de productivité.
                                    Notre solution innovante ROOM met un terme aux doutes et fournit des informations claires. Au bon endroit, au bon moment.</p>
                        </div>
                </div>
            </div>

            <div class="box3_index">
                <div class="txt3_index">
                                <h2>Réservation instantanée</h2>
                                <p>Le taux d’occupation moyen des salles de réunion est de moins de 40%. 
                                    Utilisez la capacité disponible pour des séances ad hoc en permettant à vos employés de réserver une salle disponible directement sur place.</p>
                </div>

                <div class="box_img3"><img src="../reservationsalles/image/img3_index.jpg" alt="pc working" height = 400px width = 500px></div>
            
            </div>
            
            <footer>
                <div class="contact"><h3>© Copyright 2021 – THE ROOM</h3></div>
            </footer>
    
    </div>
</body>
</html>