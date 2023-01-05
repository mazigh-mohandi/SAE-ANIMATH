DROP DATABASE IF EXISTS Animath;

CREATE DATABASE Animath;

CREATE TABLE Profs
    (
        id_prof VARCHAR(5) PRIMARY KEY,
        nomProf VARCHAR(50),
        prenomProf VARCHAR(50),
        mail VARCHAR(50),
        tel VARCHAR(10),
        mdp VARCHAR(50),
        etablissement VARCHAR (50),
        ville VARCHAR(50),
        niveau VARCHAR (50)
    );

CREATE TABLE Classes
    (
        id_classe VARCHAR(5) PRIMARY KEY,
        id_prof VARCHAR(5),
        niveau VARCHAR(50),
        nb_eleves INT
    );

CREATE TABLE Superviseurs
    (   id_super VARCHAR(5) PRIMARY KEY,
        nomSuper VARCHAR (20),
        prenomSuper VARCHAR(30),
        mail VARCHAR(50),
        tel VARCHAR(10),
        mdp VARCHAR(10)
    );

CREATE TABLE Exposants
    (
        id_expo VARCHAR(5) PRIMARY KEY,
        id_super VARCHAR(5),
        nomExposant VARCHAR(30),
        heure_ouvert TIME,
        heure_ferme TIME,
        capacite INT,
        niveau VARCHAR(50),
        duree TIME
    );

CREATE TABLE Reservations
    (
        id_res VARCHAR(5) PRIMARY KEY,
        id_personne VARCHAR(5),
        nb_participants INT
    );

CREATE TABLE Creneaux
    (
        id_creneaux VARCHAR(5) PRIMARY KEY,
        id_res VARCHAR(5),
        date_res DATE,
        heure_debut TIME,
        heure_fin TIME
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

  ALTER TABLE Classes
    ADD FOREIGN KEY (niveau) REFERENCES Profs (niveau);
