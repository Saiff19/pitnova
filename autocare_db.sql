-- =============================================
-- PITNOVA — autocare_db.sql
-- Colle ce code dans phpMyAdmin > onglet SQL
-- =============================================

-- 1. Créer la base de données
CREATE DATABASE IF NOT EXISTS autocare_db;
USE autocare_db;

-- 2. Table utilisateurs
CREATE TABLE utilisateurs (
  id           INT AUTO_INCREMENT PRIMARY KEY,
  nom          VARCHAR(100) NOT NULL,
  email        VARCHAR(100) NOT NULL UNIQUE,
  telephone    VARCHAR(20),
  mot_de_passe VARCHAR(255) NOT NULL,
  created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. Table services
CREATE TABLE services (
  id           INT AUTO_INCREMENT PRIMARY KEY,
  nom_service  VARCHAR(100) NOT NULL,
  description  TEXT,
  prix         DECIMAL(10,2),
  image        VARCHAR(200)
);

-- 4. Table réservations
CREATE TABLE reservations (
  id               INT AUTO_INCREMENT PRIMARY KEY,
  utilisateur_id   INT,
  service_id       INT,
  date_reservation DATE,
  adresse          TEXT,
  commentaire      TEXT,
  statut           VARCHAR(50) DEFAULT 'en attente',
  created_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 5. Insérer les services de base
INSERT INTO services (nom_service, description, prix, image) VALUES
('Lavage extérieur',        'Nettoyage carrosserie, jantes et vitres avec produits biodégradables.',   49.00,  'lavage.jpg'),
('Lavage complet',          'Intérieur + extérieur, aspiration, tableau de bord, lustrage.',           129.00, 'complet.jpg'),
('Dépannage urgent',        'Batterie, crevaison, panne moteur. Intervention sous 2h garantie.',       200.00, 'depannage.jpg'),
('Révision générale',       'Huile, filtres, freins, bougie. Diagnostic complet à domicile.',          350.00, 'revision.jpg'),
('Diagnostic électronique', 'Lecture des codes erreur, rapport complet envoyé par email.',             150.00, 'diagnostic.jpg'),
('Entretien pneumatiques',  'Gonflage, équilibrage et permutation des pneus à votre adresse.',          80.00, 'Pneumatiques.jpg');
