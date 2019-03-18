CREATE DATABASE `infoskaerm`;

USE `infoskaerm`;
SET foreign_key_checks = 0;

CREATE TABLE `WebSite`(
`ID` INT NOT NULL AUTO_INCREMENT,
`Title` VARCHAR(40) NOT NULL,
`SiteID` TINYINT NOT NULL,
PRIMARY KEY(`ID`)
);

CREATE TABLE `Image`(
`ID` INT NOT NULL AUTO_INCREMENT,
`Path` VARCHAR(255) NOT NULL,
PRIMARY KEY(`ID`)
);

CREATE TABLE `ImageLink`(
`WebSite_ID` INT NOT NULL,
`Image_ID` INT NOT NULL,
FOREIGN KEY(`WebSite_ID`) REFERENCES `WebSite`(`ID`),
FOREIGN KEY(`Image_ID`) REFERENCES `Image`(`ID`),
PRIMARY KEY(`WebSite_ID`, `Image_ID`)
);

CREATE TABLE `Time`(
`ID` INT NOT NULL AUTO_INCREMENT,
`StartTime` DATETIME NOT NULL,
`EndTime` DATETIME NOT NULL,
`WebSite_ID` INT NOT NULL,
FOREIGN KEY(`WebSite_ID`) REFERENCES `WebSite`(`ID`),
PRIMARY KEY(`ID`)
);

CREATE TABLE `Text`(
`ID` INT NOT NULL AUTO_INCREMENT,
`Text` VARCHAR(255) NOT NULL,
`WebSite_ID` INT NOT NULL,
FOREIGN KEY(`WebSite_ID`) REFERENCES `WebSite`(`ID`),
PRIMARY KEY(`ID`)
);



CREATE TABLE `Table`(
`ID` INT NOT NULL AUTO_INCREMENT,
`WebSite_ID` INT NOT NULL,
FOREIGN KEY(`WebSite_ID`) REFERENCES `WebSite`(`ID`),
PRIMARY KEY(`ID`)
);

CREATE TABLE `Column`(
`ID` INT NOT NULL AUTO_INCREMENT,
`Text` VARCHAR(255) NOT NULL,
PRIMARY KEY(`ID`)
);

CREATE TABLE `Row`(
`ID` INT NOT NULL AUTO_INCREMENT,
`Table_ID` INT NOT NULL,
`Column_ID` INT NOT NULL,
FOREIGN KEY(`Table_ID`) REFERENCES `Table`(`ID`),
FOREIGN KEY(`Column_ID`) REFERENCES `Column`(`ID`),
PRIMARY KEY(`ID`)
);