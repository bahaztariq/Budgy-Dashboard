CREATE DATABASE Smart_Wallet;

USE Smart_Wallet;

CREATE TABLE incomes(
    id INT PRIMARY KEY AUTO_INCREMENT,
    montant FLOAT NOT NULL,
    description varchar(1000) NOT NULL,
    date_ DATE DEFAULT (CURRENT_TIME)
);
CREATE TABLE expences(
    id INT PRIMARY KEY AUTO_INCREMENT,
    montant FLOAT NOT NULL,
    description varchar(1000) NOT NULL,
    date_ DATE DEFAULT (CURRENT_TIME)
);
