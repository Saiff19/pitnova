<?php
// =============================================
// PITNOVA — config.php
// Connexion à la base de données MySQL
// =============================================

$host = "localhost";
$user = "root";       // utilisateur XAMPP par défaut
$pass = "";           // mot de passe vide par défaut dans XAMPP
$db   = "autocare_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}
?>
