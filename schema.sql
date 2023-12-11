DROP DATABASE IF EXISTS dolphin_crm;
CREATE DATABASE IF NOT EXISTS dolphin_crm;
USE dolphin_crm;

CREATE TABLE Users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       firstname VARCHAR(50),
                       lastname VARCHAR(50),
                       password VARCHAR(255), -- Increased size for hashed passwords
                       email VARCHAR(50),
                       role VARCHAR(50),
                       created_at DATETIME
);

CREATE TABLE Contacts (
                          id INT AUTO_INCREMENT PRIMARY KEY,
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
                          FOREIGN KEY (assigned_to) REFERENCES Users(id),
                          FOREIGN KEY (created_by) REFERENCES Users(id)
);

CREATE TABLE Notes (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       contact_id INT,
                       comment TEXT,
                       created_by INT,
                       created_at DATETIME,
                       FOREIGN KEY (contact_id) REFERENCES Contacts(id),
                       FOREIGN KEY (created_by) REFERENCES Users(id)
);
