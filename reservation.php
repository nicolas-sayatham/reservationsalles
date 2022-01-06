<?php
session_start();

$bdd = mysqli_connect('localhost','root','','reservationsalles') or die("Impossible de se connecter : " . mysqli_connect_error());
mysqli_set_charset($bdd,"utf8");
$req ="SELECT * FROM reservations";
$exec_req= mysqli_query($bdd,$req);
$reservations = mysqli_fetch_all($exec_req,MYSQLI_ASSOC); 

foreach( $reservations as $value)
{}
if( $_GET['id'] = $value['id'])
    {
        echo '<br>'.$value['id'];
        echo '<br>'.$value['description'];
        echo '<br>'.$value['titre'];
    }



?>