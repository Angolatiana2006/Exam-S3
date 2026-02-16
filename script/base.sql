CREATE DATABASE 4012_4154_taximoto;
use 4012_4154_taximoto;

CREATE TABLE conducteur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

CREATE TABLE moto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    matricule VARCHAR(20) NOT NULL UNIQUE,
    consommation_par_km DECIMAL(5,2) NOT NULL DEFAULT 0.02
);


CREATE TABLE affectation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    conducteur_id INT NOT NULL,
    moto_id INT NOT NULL,
    date DATE NOT NULL,
    UNIQUE(conducteur_id, date),
    UNIQUE(moto_id, date),
    FOREIGN KEY (conducteur_id) REFERENCES conducteur(id),
    FOREIGN KEY (moto_id) REFERENCES moto(id)
);


CREATE TABLE course (
    id INT AUTO_INCREMENT PRIMARY KEY,
    affectation_id INT NOT NULL,
    heure_debut TIME NOT NULL,
    heure_fin TIME NOT NULL,
    km DECIMAL(6,2) NOT NULL,
    montant_paye DECIMAL(10,2) NOT NULL,
    lieu_depart VARCHAR(100) NOT NULL,
    lieu_arrivee VARCHAR(100) NOT NULL,
    valide TINYINT(1) NOT NULL DEFAULT 0,
    FOREIGN KEY (affectation_id) REFERENCES affectation(id)
);


CREATE TABLE conducteur_pourcentage (
    id INT AUTO_INCREMENT PRIMARY KEY,
    conducteur_id INT NOT NULL,
    pourcentage DECIMAL(5,2) NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE DEFAULT NULL,
    FOREIGN KEY (conducteur_id) REFERENCES conducteur(id)
);

CREATE TABLE moto_pourcentage (
    id INT AUTO_INCREMENT PRIMARY KEY,
    moto_id INT NOT NULL,
    pourcentage DECIMAL(5,2) NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE DEFAULT NULL,
    FOREIGN KEY (moto_id) REFERENCES moto(id)
);



INSERT INTO conducteur (nom) VALUES
('Rakoto'),
('Rasoa');


INSERT INTO moto (matricule, consommation_par_km) VALUES
('MOTO001', 0.02),
('MOTO002', 0.025);


INSERT INTO affectation (conducteur_id, moto_id, date) VALUES
(1, 1, '2025-12-17'),
(2, 2, '2025-12-17');


INSERT INTO course (affectation_id, heure_debut, heure_fin, km, montant_paye, lieu_depart, lieu_arrivee) VALUES
(1, '08:00', '09:00', 12.5, 15.00, 'Analakely', 'Isoraka'),
(2, '09:30', '10:15', 10.0, 12.00, 'Ivandry', 'Ankorondrano');


INSERT INTO conducteur_pourcentage (conducteur_id, pourcentage, date_debut) VALUES
(1, 50.00, '2025-01-01'),
(2, 60.00, '2025-01-01');


INSERT INTO moto_pourcentage (moto_id, pourcentage, date_debut) VALUES
(1, 10.00, '2025-01-01'),
(2, 12.00, '2025-01-01');


INSERT INTO conducteur (nom) VALUES
('Angolatiana'),
('Laureen');


INSERT INTO moto (matricule, consommation_par_km) VALUES
('5767 TAF', 0.02),
('6789 TBA', 0.025);


INSERT INTO affectation (conducteur_id, moto_id, date) VALUES
(3, 3, '2025-12-17'),
(4, 4, '2025-12-17');


INSERT INTO course (affectation_id, heure_debut, heure_fin, km, montant_paye, lieu_depart, lieu_arrivee) VALUES
(3, '15:00', '18:00', 15.5, 10000.00, 'Andoharanofotsy', 'Ambohidratrimo'),
(4, '09:30', '10:15', 10.0, 10000.00, 'Ivandry', 'Ankadimbahoaka');


INSERT INTO conducteur_pourcentage (conducteur_id, pourcentage, date_debut) VALUES
(3, 50.00, '2025-01-01'),
(4, 60.00, '2025-01-01');


INSERT INTO moto_pourcentage (moto_id, pourcentage, date_debut) VALUES
(3, 10.00, '2025-01-01'),
(3, 12.00, '2025-01-01');


----NOUVEAUX DONNEES EXAMENS
ALTER TABLE moto
ADD consommation_litre_par_km DECIMAL(6,4) NOT NULL DEFAULT 0
AFTER consommation_par_km;
UPDATE moto
SET consommation_litre_par_km = consommation_par_km;



CREATE TABLE carburant (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prix_par_litre DECIMAL(8,2) NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE DEFAULT NULL
);
INSERT INTO carburant (prix_par_litre, date_debut)
VALUES (6000, '2025-01-01');




INSERT INTO moto (matricule, consommation_par_km, consommation_litre_par_km)
VALUES
('1234 TAB', 0.02, 0.02),
('6767 TAG', 0.02, 0.02),
('FF0G', 0.02, 0.02),
('7777 TBH', 0.02, 0.02);

INSERT INTO moto_pourcentage (moto_id, pourcentage, date_debut)
SELECT id, 10.0, '2025-01-01'
FROM moto
WHERE matricule IN ('1234 TAB','6767 TAG','FF0G','7777 TBH');

INSERT INTO moto (matricule, consommation_par_km, consommation_litre_par_km)
VALUES
('HHHH 6578', 0.016, 0.016),
('6587 TAD', 0.016, 0.016);

INSERT INTO moto_pourcentage (moto_id, pourcentage, date_debut)
SELECT id, 15.0, '2025-01-01'
FROM moto
WHERE matricule IN ('HHHH 6578','6587 TAD');

INSERT INTO moto (matricule, consommation_par_km, consommation_litre_par_km)
VALUES
('2010 TAS', 0.013, 0.013),
('2006 TH', 0.013, 0.013),
('9086 TBA', 0.013, 0.013),
('3856 TAF', 0.013, 0.013);

INSERT INTO moto_pourcentage (moto_id, pourcentage, date_debut)
SELECT id, 11.5, '2025-01-01'
FROM moto
WHERE matricule IN ('2010 TAS','2006 TH','9086 TBA','3856 TAF');

INSERT INTO conducteur (nom)
VALUES
('Koto'),
('Mamy'),
('Delphin'),
('Rija'),
('Manoa'),
('Fidy');

INSERT INTO conducteur_pourcentage (conducteur_id, pourcentage, date_debut)
SELECT id, 15.0, '2025-01-01'
FROM conducteur
WHERE nom IN ('Koto','Mamy');

INSERT INTO conducteur_pourcentage (conducteur_id, pourcentage, date_debut)
SELECT id, 25.0, '2025-01-01'
FROM conducteur
WHERE nom IN ('Delphin','Rija');

INSERT INTO conducteur_pourcentage (conducteur_id, pourcentage, date_debut)
SELECT id, 19.5, '2025-01-01'
FROM conducteur
WHERE nom IN ('Manoa','Fidy');




