# Pitnova — Services automobiles à domicile

Projet pédagogique de développement web, EMSI Casablanca, année universitaire 2025–2026.

**Auteur : Saifalislam Moubarrad** · Encadrante : Nouhaila Moussammi.

## Présentation
Pitnova présente des prestations automobiles et propose des formulaires d'inscription, de connexion et de réservation. Le nom utilisé dans les sources et le rapport est **Pitnova**.

## Technologies et fonctionnalités
HTML, CSS, JavaScript, PHP et MySQL. Six pages : accueil, services, inscription, connexion, réservation et contact. Les scripts PHP enregistrent les utilisateurs, vérifient les mots de passe hachés et enregistrent les réservations avec une session utilisateur.

## Installation locale
1. Placer le dossier dans le répertoire web d'un environnement Apache/PHP/MySQL, par exemple `htdocs/pitnova` sous XAMPP.
2. Démarrer Apache et MySQL.
3. Importer `autocare_db.sql` dans une base locale neuve. Le script crée et utilise `autocare_db`.
4. Adapter `php/config.php` à la base locale. La configuration fournie utilise `localhost`, `root` et un mot de passe vide, pour un environnement local uniquement.
5. Ouvrir `http://localhost/pitnova/index.html`.

Le rapport emploie aussi le nom `s93_autocare_db`, mais les fichiers SQL et PHP fournis utilisent `autocare_db`.

## Organisation
Les pages HTML sont à la racine. `css/style.css` définit la présentation, `js/script.js` les interactions, `php/` les traitements et `autocare_db.sql` le schéma avec six services de démonstration. Le [rapport](docs/rapport_pitnova.docx) présente le projet.

## Limites de la version fournie
- Le dossier `images/` est vide : les images référencées par les pages manquent.
- Les requêtes SQL assemblent directement les saisies. Des requêtes préparées et une validation côté serveur sont nécessaires avant un usage public réel.
- L'adresse et la date sont affichées sans échappement HTML dans la confirmation de réservation.
- L'heure est lue dans le formulaire mais n'est pas enregistrée dans la table des réservations.
- Les chiffres et promesses commerciales des pages sont des éléments de maquette, sans preuve de clientèle ou d'activité réelle.
- Les parcours PHP/MySQL n'ont pas été exécutés lors de la préparation du dépôt.

## Hébergement
GitHub peut héberger ce code. GitHub Pages ne peut pas exécuter le PHP ni MySQL ; il peut seulement afficher les pages statiques. Le rapport mentionne une ancienne URL de démonstration dont la disponibilité actuelle n'a pas été vérifiée.

## Perspectives
Sécuriser les traitements, récupérer les images, compléter la gestion des sessions et ajouter une interface d'administration. Le paiement, la géolocalisation et l'application mobile sont des perspectives, pas des fonctionnalités réalisées.
