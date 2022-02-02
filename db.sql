
CREATE TABLE `orders` (
                          `OrderID` int(11) NOT NULL,
                          `UserID` int(11) NOT NULL,
                          `ProductID` int(11) NOT NULL,
                          `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `product` (
                           `ProductID` int(11) NOT NULL,
                           `Titel` varchar(255) NOT NULL,
                           `Omschrijving` varchar(255) NOT NULL,
                           `Categorie` varchar(255) NOT NULL,
                           `Prijs` varchar(255) NOT NULL,
                           `Afbeelding` varchar(255) NOT NULL,
                           `Leeftijd` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `users` (
                         `UserID` int(11) NOT NULL,
                         `PasswordHash` varchar(255) NOT NULL,
                         `Voornaam` varchar(255) NOT NULL,
                         `Achternaam` varchar(255) NOT NULL,
                         `Geboortedatum` date NOT NULL,
                         `Adres` varchar(255) NOT NULL,
                         `Postcode` varchar(255) NOT NULL,
                         `Plaats` varchar(255) NOT NULL,
                         `Email` varchar(255) NOT NULL,
                         `Role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `orders`
    ADD PRIMARY KEY (`OrderID`),
    ADD KEY `Orders_fk0` (`UserID`),
    ADD KEY `Orders_fk1` (`ProductID`);

ALTER TABLE `product`
    ADD PRIMARY KEY (`ProductID`);

ALTER TABLE `users`
    ADD PRIMARY KEY (`UserID`);

ALTER TABLE `orders`
    MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `product`
    MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
    MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `orders`
    ADD CONSTRAINT `Orders_fk0` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
    ADD CONSTRAINT `Orders_fk1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);
COMMIT;

