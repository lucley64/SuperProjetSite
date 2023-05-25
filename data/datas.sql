DROP DATABASE IF EXISTS datas;
CREATE DATABASE datas;
USE datas;

CREATE TABLE IF NOT EXISTS Users (
  username VARCHAR(30) PRIMARY KEY,
  pwd VARCHAR(255) NOT NULL,
  userType VARCHAR(30), -- admin, gest ou etudiant
  lastName VARCHAR(30),
  firstName VARCHAR(30),
  workplace VARCHAR(30),
  studyLvl VARCHAR(2),
  phone VARCHAR(10),
  mail VARCHAR(50),
  startDate DATE,
  endDate DATE
);



CREATE TABLE IF NOT EXISTS Messages(
  idMessage int PRIMARY KEY AUTO_INCREMENT,
  expediteur VARCHAR(30),
  destinataire VARCHAR(30),
  messages TEXT,
  sujet TEXT);

CREATE TABLE IF NOT EXISTS DataChallenges (
  challengeName VARCHAR(50) PRIMARY KEY,
  startDate DATE,
  endDate DATE
);

CREATE TABLE IF NOT EXISTS ProjectData (
  nom VARCHAR(50) PRIMARY KEY,
  dataChallengeId VARCHAR(50),
  details TEXT,
  img TEXT,
  phone TEXT,
  mail TEXT,
  FOREIGN KEY fk_dataChallenge(challengeName) REFERENCES DataChallenges(challengeName) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Ressources (
  content VARCHAR(300) PRIMARY KEY,
  dataChallengeId VARCHAR(50),
  projectId VARCHAR(50),
  FOREIGN KEY fk_dataChallenge(challengeName) REFERENCES DataChallenges(challengeName) ON DELETE CASCADE,
  FOREIGN KEY fk_project(nom) REFERENCES ProjectData(nom) ON DELETE CASCADE
);