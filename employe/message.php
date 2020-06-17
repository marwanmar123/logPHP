<?php 
session_start();
include 'functions.php';
$pdo = pdo_connect_mysql();
$query = "SELECT * FROM demande WHERE id_user = " .$_SESSION['user']['id'];
$d = $pdo->query($query);
foreach ($d as $message){
    print_r($message['operation']);
}


?>