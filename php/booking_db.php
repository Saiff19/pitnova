<?php
// =============================================
// PITNOVA — booking_db.php
// Reçoit les données du formulaire booking.html
// Enregistre la réservation dans la base
// =============================================

session_start();
include 'config.php';

// 1. Vérifier que l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.html");
    exit;
}

// 2. Récupérer les données du formulaire
$utilisateur_id = $_SESSION['user_id'];
$service_id     = $_POST['service_id'];
$date           = $_POST['date'];
$heure          = $_POST['heure'];
$adresse        = $_POST['adresse'];
$commentaire    = $_POST['commentaire'];

// 3. Insérer la réservation dans la base
$sql = "INSERT INTO reservations (utilisateur_id, service_id, date_reservation, adresse, commentaire, statut)
        VALUES ('$utilisateur_id', '$service_id', '$date', '$adresse', '$commentaire', 'en attente')";

if (mysqli_query($conn, $sql)) {
    // Succès — afficher page de confirmation
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>PitNova — Réservation confirmée</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

  <div class="nav">
    <a href="../index.html" class="nav-logo">Pit<span>Nova</span></a>
    <ul>
      <li><a href="../index.html">Accueil</a></li>
      <li><a href="../services.html">Services</a></li>
      <li><a href="../booking.html">Réservation</a></li>
      <li><a href="../contact.html">Contact</a></li>
    </ul>
    <a href="../booking.html" class="btn-cta">Réserver</a>
  </div>

  <div style="text-align:center; padding:80px 40px; background-color:#f8f9fa; min-height:60vh;">
    <div style="background-color:#fff; border:1px solid #eee; border-radius:14px; padding:50px; display:inline-block; max-width:500px;">
      <div style="font-size:48px; margin-bottom:20px;">✅</div>
      <h2 style="color:#0d0d1a; font-size:24px; margin-bottom:12px;">Réservation confirmée !</h2>
      <p style="color:#888; font-size:14px; line-height:1.7; margin-bottom:28px;">
        Merci pour votre réservation. Un technicien PitNova vous contactera sous 24h pour confirmer le créneau.
      </p>
      <p style="color:#888; font-size:13px; margin-bottom:6px;"><strong style="color:#0d0d1a;">Date :</strong> <?php echo $date; ?></p>
      <p style="color:#888; font-size:13px; margin-bottom:6px;"><strong style="color:#0d0d1a;">Adresse :</strong> <?php echo $adresse; ?></p>
      <p style="color:#888; font-size:13px; margin-bottom:28px;"><strong style="color:#0d0d1a;">Statut :</strong> <span style="color:#FF6B35;">En attente</span></p>
      <a href="../index.html" class="btn-primary" style="text-decoration:none; padding:12px 28px; background-color:#FF6B35; color:#fff; border-radius:8px; font-size:14px;">Retour à l'accueil</a>
    </div>
  </div>

  <div class="footer">
    <div class="footer-col">
      <h4>Pit<span style="color:#FF6B35;">Nova</span></h4>
      <p>Fast help. Smart service.</p>
    </div>
    <div class="footer-col">
      <h4>Navigation</h4>
      <a href="../index.html">Accueil</a>
      <a href="../services.html">Services</a>
    </div>
    <div class="footer-col">
      <h4>Contact</h4>
      <a href="#">contact@pitnova.ma</a>
    </div>
  </div>
  <div class="footer-bottom">
    <span>© 2025 PitNova. Tous droits réservés.</span>
    <span>Fast Help. Smart Service.</span>
  </div>

</body>
</html>

<?php
} else {
    // Erreur base de données
    echo "<p style='color:red; text-align:center; font-family:Arial; margin-top:40px;'>Erreur : " . mysqli_error($conn) . "</p>";
    echo "<p style='text-align:center; font-family:Arial;'><a href='../booking.html'>Retour</a></p>";
}
?>
