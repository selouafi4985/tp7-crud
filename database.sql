CREATE DATABASE IF NOT EXISTS tp7_crud CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE tp7_crud;

-- 1. Table des formations
CREATE TABLE formations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code_formation VARCHAR(50) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    duree INT NOT NULL
) ENGINE=InnoDB;

-- 2. Table des etudiants
CREATE TABLE etudiants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_complet VARCHAR(100) NOT NULL,
    code_formation INT NOT NULL,
    CONSTRAINT fk_etudiant_formation FOREIGN KEY (code_formation) 
        REFERENCES formations(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 3. Table des modules
CREATE TABLE modules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code_module VARCHAR(50) NOT NULL,
    titre VARCHAR(100) NOT NULL,
    code_formation INT NOT NULL,
    CONSTRAINT fk_module_formation FOREIGN KEY (code_formation) 
        REFERENCES formations(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Donnees initiales de test
INSERT INTO formations (code_formation, nom, duree) VALUES 
('F01', 'Developpement Web Full Stack', 6),
('F02', 'DevOps et Cloud Computing', 4);