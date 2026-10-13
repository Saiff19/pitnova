<?php
// =============================================
// PITNOVA — login_db.php
// Reçoit les données du formulaire login.html
// Vérifie l'utilisateur dans la base de données
// =============================================

session_start();
include 'config.php';

// 1. Récupérer les données du formulaire
$email    = $_POST['email'];
$password = $_POST['password'];

// 2. Chercher l'utilisateur dans la base par email
$sql = "SELECT * FROM utilisateurs WHERE email = '$email'";
$res = mysqli_query($conn, $sql);

// 3. Vérifier si l'utilisateur existe
if (mysqli_num_rows($res) == 1) {

    $user = mysqli_fetch_assoc($res);

    // 4. Vérifier le mot de passe
    if (password_verify($password, $user['mot_de_passe'])) {

        // 5. Enregistrer la session
        $_SESSION['user_id']  = $user['id'];
        $_SESSION['user_nom'] = $user['nom'];

        // 6. Rediriger vers l'accueil
        header("Location: ../index.html");
        exit;

    } else {
        // Mot de passe incorrect
        header("Location: ../login.html?error=password");
        exit;
    }

} else {
    // Email introuvable
    header("Location: ../login.html?error=email");
    exit;
}
?>
