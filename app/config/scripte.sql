CREATE DATABASE Eventbrite ;
USE Eventbrite ; 

CREATE TABLE Role (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL
);

CREATE TABLE Utilisateur (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    motDePasse VARCHAR(255) NOT NULL,
    role_id INT,
    FOREIGN KEY (role_id) REFERENCES Role(id),
     is_active int DEFAULT 1
    
);

CREATE TABLE Evenement (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(200) NOT NULL,
    description TEXT,
    date DATE NOT NULL,
    lieu VARCHAR(200),
    prix FLOAT NOT NULL,
    capacite INT NOT NULL,
    statut VARCHAR(50) NOT NULL,
    is_verified int DEFAULT 0,
    categorie_id INT,
    user_id INT,
    image_url VARCHAR(255),
    FOREIGN KEY (categorie_id) REFERENCES Categorie(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES Utilisateur(id) ON DELETE CASCADE
);


CREATE TABLE Categorie (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL
);


CREATE TABLE Tag (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE Evenement_Tag (
    evenement_id INT,
    tag_id INT,
    PRIMARY KEY (evenement_id, tag_id),
    FOREIGN KEY (evenement_id) REFERENCES Evenement(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES Tag(id) ON DELETE CASCADE
);

CREATE TABLE Evenement_Participant (
    evenement_id INT,
    user_id INT,
    PRIMARY KEY (evenement_id, user_id),
    FOREIGN KEY (evenement_id) REFERENCES Evenement(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES Utilisateur(id) ON DELETE CASCADE
);

CREATE TABLE Sponsor (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    montant FLOAT NOT NULL
);

CREATE TABLE Evenement_Sponsor (
    evenement_id INT,
    sponsor_id INT,
    PRIMARY KEY (evenement_id, sponsor_id),
    FOREIGN KEY (evenement_id) REFERENCES Evenement(id) ON DELETE CASCADE,
    FOREIGN KEY (sponsor_id) REFERENCES Sponsor(id) ON DELETE CASCADE
);

CREATE TABLE Billet (
    id INT PRIMARY KEY AUTO_INCREMENT,
    type VARCHAR(50),
    prix FLOAT NOT NULL,
    qrCode VARCHAR(255) UNIQUE NOT NULL,
    evenement_id INT,
    FOREIGN KEY (evenement_id) REFERENCES Evenement(id) ON DELETE CASCADE
);

CREATE TABLE OrderTable (
    id INT PRIMARY KEY AUTO_INCREMENT,
    date DATE NOT NULL,
    statut VARCHAR(50) NOT NULL,
    participant_id INT,
    FOREIGN KEY (participant_id) REFERENCES Utilisateur(id) ON DELETE CASCADE
);

CREATE TABLE Order_Billet (
    order_id INT,
    billet_id INT,
    PRIMARY KEY (order_id, billet_id),
    FOREIGN KEY (order_id) REFERENCES OrderTable(id) ON DELETE CASCADE,
    FOREIGN KEY (billet_id) REFERENCES Billet(id) ON DELETE CASCADE
);

CREATE TABLE Paiement (
    id INT PRIMARY KEY AUTO_INCREMENT,
    montant FLOAT NOT NULL,
    methode VARCHAR(50) NOT NULL,
    etat VARCHAR(50) NOT NULL,
    order_id INT,
    FOREIGN KEY (order_id) REFERENCES OrderTable(id) ON DELETE CASCADE
);

CREATE TABLE Notification (
    id INT PRIMARY KEY AUTO_INCREMENT,
    message TEXT NOT NULL,
    utilisateur_id INT,
    FOREIGN KEY (utilisateur_id) REFERENCES Utilisateur(id) ON DELETE CASCADE
);

CREATE TABLE Statistiques (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombreUtilisateurs INT,
    nombreEvenements INT,
    revenusTotal FLOAT
);

-- Insert roles
INSERT INTO Role (nom) VALUES 
('Admin'),
('Organisateur'),
('Participant');

-- Insert users
INSERT INTO Utilisateur (nom, email, motDePasse, role_id, is_active) VALUES 
('Alice Dupont', 'alice@example.com', '$2y$10$e0N1Z1Z1Z1Z1Z1Z1Z1Z1Z1u', 1, true), -- Admin
('Bob Martin', 'bob@example.com', '$2y$10$e0N1Z1Z1Z1Z1Z1Z1Z1Z1Z1u', 2, true), -- Organizer
('Charlie Smith', 'charlie@example.com', '$2y$10$e0N1Z1Z1Z1Z1Z1Z1Z1Z1Z1u', 3, true); -- Participant

-- Insert categories
INSERT INTO Categorie (nom) VALUES 
('Conférence'),
('Concert'),
('Sport'),
('Atelier');

-- Insert tags
INSERT INTO Tag (nom) VALUES 
('Technologie'),
('Musique'),
('Éducation'),
('Loisirs');

-- Insert events
INSERT INTO Evenement (titre, description, date, lieu, prix, capacite, statut, is_verified, categorie_id, image_url) VALUES 
('Tech Conference 2023', 'A conference about the latest in technology.', '2023-09-15', 'Paris', 150.00, 200, 'actif', true, 1, 'https://example.com/image1.jpg'),
('Summer Music Festival', 'Enjoy a day of music and fun.', '2023-07-20', 'Lyon', 75.00, 500, 'actif', true, 2, 'https://example.com/image2.jpg'),
('Football Match', 'Watch the local team play.', '2023-08-10', 'Marseille', 30.00, 1000, 'actif', true, 3, 'https://example.com/image3.jpg');

-- Insert event tags
INSERT INTO Evenement_Tag (evenement_id, tag_id) VALUES 
(1, 1), -- Tech Conference 2023 - Technologie
(2, 2), -- Summer Music Festival - Musique
(3, 3); -- Football Match - Éducation

-- Insert sponsors
INSERT INTO Sponsor (nom, montant) VALUES 
('Tech Corp', 5000.00),
('Music Inc', 3000.00);

-- Insert event sponsors
INSERT INTO Evenement_Sponsor (evenement_id, sponsor_id) VALUES 
(1, 1), -- Tech Conference 2023 - Tech Corp
(2, 2); -- Summer Music Festival - Music Inc

-- Insert tickets
INSERT INTO Billet (type, prix, qrCode, evenement_id) VALUES 
('VIP', 200.00, 'QR123456789', 1),
('Standard', 100.00, 'QR987654321', 1),
('General', 30.00, 'QR111222333', 2);

-- Insert orders
INSERT INTO OrderTable (date, statut, participant_id) VALUES 
('2023-06-01', 'terminé', 3), -- Charlie Smith
('2023-06-02', 'en attente', 3); -- Charlie Smith

-- Insert order tickets
INSERT INTO Order_Billet (order_id, billet_id) VALUES 
(1, 1), -- Order 1 - VIP ticket for Tech Conference
(1, 2), -- Order 1 - Standard ticket for Tech Conference
(2, 3); -- Order 2 - General ticket for Summer Music Festival

-- Insert payments
INSERT INTO Paiement (montant, methode, etat, order_id) VALUES 
(300.00, 'Stripe', 'réussi', 1), -- Payment for Order 1
(30.00, 'PayPal', 'en attente', 2); -- Payment for Order 2

-- Insert notifications
INSERT INTO Notification (message, utilisateur_id) VALUES 
('Votre inscription à la Tech Conference 2023 a été confirmée.', 3), -- Notification for Charlie Smith
('Nouveau événement ajouté: Summer Music Festival.', 1); -- Notification for Admin

-- Insert statistics
INSERT INTO Statistiques (nombreUtilisateurs, nombreEvenements, revenusTotal) VALUES 
(3, 3, 330.00); -- Sample statistics


