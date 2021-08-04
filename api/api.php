<?php
require '../class/user.php';
$user = new BonnePlateforme();

if(isset($_POST['connexion'])){
    $mail = $_POST['user'];
    $password = $_POST['password'];
    echo $user->connect($mail, $password);
}

if(isset($_POST['inscription'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $cp = $_POST['cp'];
    $ville = $_POST['ville'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    echo $user->inscription($nom, $prenom, $telephone, $adresse, $cp, $ville, $mail, $password);
}
?>