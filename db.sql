CREATE TABLE `Users` (
                         `UserID` int NOT NULL AUTO_INCREMENT,
                         `Voornaam` varchar(255) NOT NULL,
                         `Achternaam` varchar(255) NOT NULL,
                         `Geboortedatum` DATE NOT NULL,
                         `Adres` varchar(255) NOT NULL,
                         `Postcode` varchar(255) NOT NULL,
                         `Plaats` varchar(255) NOT NULL,
                         `Email` varchar(255) NOT NULL,
                         `Role` varchar(255) NOT NULL,
                         PRIMARY KEY (`UserID`)
);

CREATE TABLE `Product` (
                           `ProductID` int NOT NULL AUTO_INCREMENT,
                           `Titel` varchar(255) NOT NULL,
                           `Omschrijving` varchar(255) NOT NULL,
                           `Categorie` varchar(255) NOT NULL,
                           `Prijs` varchar(255) NOT NULL,
                           `Afbeelding` varchar(255) NOT NULL,
                           `Leeftijd` BOOLEAN NOT NULL,
                           PRIMARY KEY (`ProductID`)
);

CREATE TABLE `Orders` (
                          `OrderID` int NOT NULL AUTO_INCREMENT,
                          `UserID` int NOT NULL,
                          `ProductID` int NOT NULL,
                          `Status` varchar(255) NOT NULL,
                          PRIMARY KEY (`OrderID`)
);

ALTER TABLE `Orders` ADD CONSTRAINT `Orders_fk0` FOREIGN KEY (`UserID`) REFERENCES `Users`(`UserID`);

ALTER TABLE `Orders` ADD CONSTRAINT `Orders_fk1` FOREIGN KEY (`ProductID`) REFERENCES `Product`(`ProductID`);



