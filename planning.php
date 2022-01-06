<?php
session_start();



$bdd = mysqli_connect('localhost','root','','reservationsalles') or die("Impossible de se connecter : " . mysqli_connect_error());
mysqli_set_charset($bdd,"utf8");
$req ="SELECT * FROM reservations";
$exec_req= mysqli_query($bdd,$req);
$reservations = mysqli_fetch_all($exec_req,MYSQLI_ASSOC); 



setlocale (LC_TIME, 'fr_FR.utf8','Fra');
$lundi = utf8_encode(strftime("%A %d %B %G", strtotime('Monday')));
$mardi = utf8_encode(strftime("%A %d %B %G", strtotime('Tuesday')));
$mercredi = utf8_encode(strftime("%A %d %B %G", strtotime('Wednesday')));
$jeudi = utf8_encode(strftime("%A %d %B %G", strtotime('Thursday')));
$vendredi = utf8_encode(strftime("%A %d %B %G", strtotime('Friday')));


$semaine = array($lundi,$mardi,$mercredi,$jeudi,$vendredi);
$horaires = array('08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00');

foreach( $reservations as $value)
{
    $debut = $value['debut'];
    $time = strtotime($debut);
    $jourDebut = strftime("%A %d %B %G",$time);
    $heureDebut = date("H:00",$time);
                            
    $fin = $value['fin'];
    $endtime = strtotime($fin);
    $heureFin = date("H:00",$endtime);
                
    $j = $jourDebut;
    $hd = $heureDebut;
    $hf = $heureFin;
                
    $id = $value['id'];
    $desc = $value['description']; 

}

$event =array( $debut);

                        var_dump($event);

                    for($a = 0; $a < count($event); $a++)
                    {
                        echo $event[$a];

                        
                    }




// foreach( $reservations as $value)
// {

//     $debut = $value['debut'];
//     $time = strtotime($debut);
//     $jourDebut = strftime("%A %d %B %G",$time);
//     $heureDebut = date("H:00",$time);
    
//     $fin = $value['fin'];
//     $endtime = strtotime($fin);
//     $heureFin = date("H:00",$endtime);


//     var_dump($heureDebut);


// }

echo '<table>';
echo '<tr>';
echo '<td>';



for ($i = 0 ; $i < 5 ; $i++)
{   
    
    echo '<th>'.($semaine[$i]).'</th>';
    
}
echo '</tr>';
                       


foreach( $reservations as $value)
{
    $debut = $value['debut'];
    $time = strtotime($debut);
    $jourDebut = strftime("%A %d %B %G",$time);
    $heureDebut = date("H:00",$time);
                            
    $fin = $value['fin'];
    $endtime = strtotime($fin);
    $heureFin = date("H:00",$endtime);
                
    $j = $jourDebut;
    $hd = $heureDebut;
    $hf = $heureFin;
                
    $id = $value['id'];
    $desc = $value['description']; 

    for ($l = 0 ; $l < 12 ; $l++) 
    {
        echo '<tr>';
        echo '<td>'.($horaires[$l]).'</td>'; 

        for ($i = 0 ; $i <= 4  ; $i++) // Affichage de la semaine
        {

            for ( $t = 0 ; $t < 1 ; $t++)
            {
                
                if ($hd === $horaires[$l] && $j === $semaine[$i] )

                {
                
                echo '<td>'.$desc.'</td>';
                
                } 
            
                else 
                {
                    echo '<td>';
                }
            }
        }
    }
}

        echo '</tr>';

    
    
// var_dump($semaine);

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
    <div class="main_planning">
        <header>
            <div class="box_header">
                <div class="box_lien">
                    <div><a href="./index.php">Accueil</a></div>
                </div>
            </div>
        </header>
    
        <div class="calendrier">
            <div class="box_titre_planning">
                        
                        <h2>Liste des évènements :</h2>
                        <p>Pour réserver une salle veuillez selectionner un créneau en cliquant dessus</p>
            </div>


            
        </div>


        <footer>
            <div class="contact"><h3>© Copyright 2021 – THE ROOM</h3></div>
        </footer>
    </div>
</body>
</html>