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


INSERT INTO villes (name) VALUES
('Antananarivo'),
('Toamasina'),
('Fianarantsoa'),
('Mahajanga'),
('Toliara');


INSERT INTO besoins_types (type, name) VALUES
('nature', 'Arbres'),
('nature', 'Plantes'),
('materiaux', 'Ciment'),
('materiaux', 'Bois'),
('argent', 'Fonds urgents'),
('autres', 'Équipement scolaire');


INSERT INTO besoins (ville_id, besoin_type_id, quantite, unite) VALUES
(1, 1, 100, 'arbres'),
(1, 3, 500, 'kg'),
(2, 2, 200, 'plantes'),
(2, 5, 1000, 'Ar'),
(3, 4, 50, 'bois'),
(4, 6, 30, 'kits'),
(5, 3, 300, 'kg');


INSERT INTO dons (besoin_type_id, quantite) VALUES
(1, 20),
(3, 100),
(5, 500),
(6, 10);


INSERT INTO attributions (besoin_id, don_id, quantite) VALUES
(1, 1, 20),
(2, 2, 100),
(4, 3, 200),
(6, 4, 10);
