<?php
//Connection à la base de donnée
$host = 'localhost';
$dbname = 'ega_manager';
$username = 'root';
$password = 'NouveauMotDePasse';

try{
    $bdd = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    die("<div style='color:red; font-family:sans-serif;'>Erreur de connexion : " . $e->getMessage() . "</div>");
}
?>
