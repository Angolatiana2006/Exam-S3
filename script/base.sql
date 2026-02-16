CREATE DATABASE IF NOT EXISTS bngrc;
USE bngrc;

-- Table des villes
CREATE TABLE villes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- Table des types de besoins
CREATE TABLE besoins_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type ENUM('nature','materiaux','argent','autres') NOT NULL,
    name VARCHAR(100) NOT NULL
);

-- Table des besoins par ville
CREATE TABLE besoins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ville_id INT NOT NULL,
    besoin_type_id INT NOT NULL,
    quantite DECIMAL(10,2) NOT NULL,
    unite VARCHAR(20) DEFAULT NULL, -- ex: kg, litres, Ar
    FOREIGN KEY (ville_id) REFERENCES villes(id) ON DELETE CASCADE,
    FOREIGN KEY (besoin_type_id) REFERENCES besoins_types(id) ON DELETE CASCADE
);

-- Table des dons
CREATE TABLE dons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    besoin_type_id INT NOT NULL,
    quantite DECIMAL(10,2) NOT NULL,
    date_don DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (besoin_type_id) REFERENCES besoins_types(id) ON DELETE CASCADE
);

-- Table des attributions de dons aux besoins
CREATE TABLE attributions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    besoin_id INT NOT NULL,
    don_id INT NOT NULL,
    quantite DECIMAL(10,2) NOT NULL,
    date_attribution DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (besoin_id) REFERENCES besoins(id) ON DELETE CASCADE,
    FOREIGN KEY (don_id) REFERENCES dons(id) ON DELETE CASCADE
);
