DROP DATABASE IF EXISTS datas;
CREATE DATABASE datas;
USE datas;

CREATE TABLE IF NOT EXISTS Users (
  username VARCHAR(30) PRIMARY KEY,
  pwd VARCHAR(255) NOT NULL,
  userType VARCHAR(30), -- admin, manager ou student
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
  sujet TEXT,
  idEquipeARejoindre int DEFAULT -1,
  FOREIGN KEY fkuserdest(destinataire) REFERENCES Users(username) ON DELETE CASCADE,
  FOREIGN KEY fkuserexp(expediteur) REFERENCES Users(username) ON DELETE CASCADE
  );

CREATE TABLE IF NOT EXISTS DataChallenges (
  challengeName VARCHAR(50) PRIMARY KEY,
  startDate DATE,
  endDate DATE,
  gestionnaire VARCHAR(30)
);

CREATE TABLE IF NOT EXISTS ProjectData (
  nom VARCHAR(50) PRIMARY KEY,
  dataChallengeId VARCHAR(50),
  details TEXT,
  img TEXT,
  phone TEXT,
  mail TEXT,
  FOREIGN KEY fk_dataChallenge(dataChallengeId) REFERENCES DataChallenges(challengeName) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Ressources (
  content VARCHAR(300) PRIMARY KEY,
  projectId VARCHAR(50),
  FOREIGN KEY fk_project(projectId) REFERENCES ProjectData(nom) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Equipe(
  id INT PRIMARY KEY AUTO_INCREMENT,
	nomEquipe VARCHAR(30),
  dataChallenge VARCHAR(50),
  capitaine VARCHAR(30),
  githubLink TEXT,
  score INT DEFAULT 0 NOT NULL,
  FOREIGN KEY fk_dataChallenge(dataChallenge) REFERENCES DataChallenges(challengeName) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Participe(
	idEquipe INT,
	idUser VARCHAR(30),
  CONSTRAINT pk_Participe PRIMARY KEY (idEquipe, idUser),
	FOREIGN KEY fk_equipe(idEquipe) REFERENCES Equipe(id) ON DELETE CASCADE,
	FOREIGN KEY fk_user(idUser) REFERENCES Users(username) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Questionnaire(
  id INT PRIMARY KEY AUTO_INCREMENT,
  startDate DATE,
  endDate DATE,
  dataChallenge VARCHAR(50),
  FOREIGN KEY fk_dataChallenge(dataChallenge) REFERENCES DataChallenges(challengeName) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Question(
  id INT PRIMARY KEY AUTO_INCREMENT,
  questionnaire INT,
  content TEXT,
  FOREIGN KEY fk_questionnaire(questionnaire) REFERENCES Questionnaire(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Reponse(
  id INT PRIMARY KEY AUTO_INCREMENT,
  content TEXT,
  question INT,
  idEquipe INT,
  FOREIGN KEY fk_question(question) REFERENCES Question(id) ON DELETE CASCADE,
  FOREIGN KEY fk_Equipe(idEquipe) REFERENCES Equipe(id) ON DELETE CASCADE
);
