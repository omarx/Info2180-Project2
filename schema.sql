CREATE DATABASE dolphin_crm;

USE dolphin_crm;

CREATE TABLE Users (
   id INT AUTO_INCREMENT,
   firstname VARCHAR(50),
   lastname VARCHAR(50),
   password VARCHAR(50),
   email VARCHAR(50),
   role VARCHAR(50),
   created_at DATETIME,
   PRIMARY KEY(id)
);

CREATE TABLE Contacts (
   id INT AUTO_INCREMENT,
   title VARCHAR(50),
   firstname VARCHAR(50),
   lastname VARCHAR(50),
   email VARCHAR(50),
   telephone VARCHAR(20),
   company VARCHAR(50),
   type VARCHAR(20),
   assigned_to INT,
   created_by INT,
   created_at DATETIME,
   updated_at DATETIME,
   PRIMARY KEY(id),
   FOREIGN KEY (assigned_to) REFERENCES Users(id),
   FOREIGN KEY (created_by) REFERENCES Users(id)
);

CREATE TABLE Notes (
   id INT AUTO_INCREMENT,
   contact_id INT,
   comment TEXT,
   created_by INT,
   created_at DATETIME,
   PRIMARY KEY(id),
   FOREIGN KEY (contact_id) REFERENCES Contacts(id),
   FOREIGN KEY (created_by) REFERENCES Users(id)
);

DELIMITER //
CREATE PROCEDURE InsertUser(IN firstname VARCHAR(50), IN lastname VARCHAR(50))
BEGIN
  INSERT INTO Users (firstname, lastname, password, email, role, created_at) 
  VALUES (firstname, lastname, 'password123', 'admin@project2.com', 'admin', NOW());
END//
DELIMITER ;


INSERT INTO Users (firstname, lastname, password, email, role, created_at) 
VALUES (@firstname, @lastname, @password, @email, @role, NOW());

CALL InsertUser('John', 'Doe');