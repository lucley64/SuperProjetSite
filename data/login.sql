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
  sujet TEXT
);