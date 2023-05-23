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

CREATE TABLE IF NOT EXISTS DataChallenges (
  challengeName VARCHAR(50) PRIMARY KEY,
  startDate DATE,
  endDate DATE
)

CREATE TABLE IF NOT EXISTS ProjectData (
  id INT PRIMARY KEY,
  dataChallengeId VARCHAR(50),
  details TEXT,
  img TEXT,
  phone TEXT,
  mail TEXT
)

CREATE TABLE IF NOT EXISTS Ressources (
  id INT PRIMARY KEY,
  dataChallengeId VARCHAR(50),
  projectId INT
)
  