<?php
// =============================================
// PITNOVA — register_db.php
// Reçoit les données du formulaire register.html
// Insère un nouvel utilisateur dans la base
// =============================================

include 'config.php';

// 1. Récupérer les données du formulaire
$nom       = $_POST['nom'];
$prenom    = $_POST['prenom'];
$email     = $_POST['email'];
$telephone = $_POST['telephone'];
$password  = $_POST['password'];
$confirm   = $_POST['confirm'];

// 2. Vérifier que les mots de passe correspondent
if ($password !== $confirm) {
    echo "<p style='color:red; text-align:center; font-family:Arial; margin-top:40px;'>Les mots de passe ne correspondent pas.</p>";
    echo "<p style='text-align:center; font-family:Arial;'><a href='../register.html'>Retour</a></p>";
    exit;
}

// 3. Hacher le mot de passe (sécurité)
$mot_de_passe = password_hash($password, PASSWORD_DEFAULT);

// 4. Insérer dans la table utilisateurs
$sql = "INSERT INTO utilisateurs (nom, email, telephone, mot_de_passe)
        VALUES ('$nom $prenom', '$email', '$telephone', '$mot_de_passe')";

if (mysqli_query($conn, $sql)) {
    // Succès → rediriger vers la page connexion
    header("Location: ../login.html?success=1");
    exit;
} else {
    // Erreur (ex: email déjà existant)
    echo "<p style='color:red; text-align:center; font-family:Arial; margin-top:40px;'>Erreur : " . mysqli_error($conn) . "</p>";
    echo "<p style='text-align:center; font-family:Arial;'><a href='../register.html'>Retour</a></p>";
}
?>
