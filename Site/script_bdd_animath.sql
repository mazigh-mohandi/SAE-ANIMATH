DROP TABLE IF EXISTS Stand;
DROP TABLE IF EXISTS Exposants;
DROP TABLE IF EXISTS Creneaux;
DROP TABLE IF EXISTS Reservations;
DROP TABLE IF EXISTS Classes;
DROP TABLE IF EXISTS Superviseurs;
DROP TABLE IF EXISTS Profs;


CREATE TABLE Profs
    (
        id_prof INT PRIMARY KEY,
        nomProf VARCHAR(50),
        prenomProf VARCHAR(50),
        etablissement VARCHAR (50),
        niveau VARCHAR (50),
        ville VARCHAR(50),
        mail VARCHAR(50),
        mdp VARCHAR(5000)
    );

CREATE TABLE Classes
    (
        id_classe INT PRIMARY KEY,
        id_prof INT,
        niveau VARCHAR(50),
        nb_eleves INT
    );

CREATE TABLE Superviseurs
    (   id_super INT PRIMARY KEY,
        nomSuper VARCHAR (20),
        prenomSuper VARCHAR(30),
        mail VARCHAR(50),
        mdp VARCHAR(5000)
    );

CREATE TABLE Exposants
    (
        id_expo INT PRIMARY KEY,
        id_super INT,
        nomExposant VARCHAR(30),
        heure_ouvert TIME,
        heure_ferme TIME,
        capacite INT,
        niveau VARCHAR(50),
        duree TIME
    );

CREATE TABLE Reservations
    (
        id_res INT PRIMARY KEY,
        id_personne INT,
        nb_participants INT
    );

CREATE TABLE Creneaux
    (
        id_creneaux INT PRIMARY KEY,
        id_res INT,
        date_res DATE,
        heure_debut TIME,
        heure_fin TIME
    );

CREATE TABLE Stand 
    (
      id_stand INT AUTO_INCREMENT PRIMARY KEY,
      id_expo INT,
      nom VARCHAR(255) NOT NULL,
      description TEXT,
      capacite INT,
      journee BOOLEAN,
      duree TIME,
      inters TIME,
      nbex_j INT,
      nbex_v INT
    );

ALTER TABLE Classes
    ADD FOREIGN KEY(id_prof) REFERENCES Profs(id_prof);

ALTER TABLE Exposants
    ADD FOREIGN KEY(id_super) REFERENCES Superviseurs(id_super);

ALTER TABLE Reservations
    ADD FOREIGN KEY(id_personne) REFERENCES Superviseurs(id_super);

ALTER TABLE Reservations
    ADD FOREIGN KEY(id_personne) REFERENCES Profs(id_prof);

ALTER TABLE Creneaux
    ADD FOREIGN KEY(id_res) REFERENCES Reservations(id_res);

ALTER TABLE Stand
    ADD FOREIGN KEY (id_expo) REFERENCES Exposants(id_expo);
