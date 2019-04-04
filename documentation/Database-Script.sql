CREATE DATABASE `infoskaerm`;

USE `infoskaerm`;

CREATE TABLE IF NOT EXISTS `WebSite`(
`ID` INT NOT NULL AUTO_INCREMENT,
`Title` VARCHAR(40) NOT NULL,
`SiteID` TINYINT NOT NULL,
PRIMARY KEY(`ID`)
);

CREATE TABLE IF NOT EXISTS `Image`(
`ID` INT NOT NULL AUTO_INCREMENT,
`Path` VARCHAR(255) NOT NULL,
PRIMARY KEY(`ID`)
);

CREATE TABLE IF NOT EXISTS `ImageLink`(
`WebSite_ID` INT NOT NULL,
`Image_ID` INT NOT NULL,
`Image_Style` VARCHAR(255) NOT NULL,
FOREIGN KEY(`WebSite_ID`) REFERENCES `WebSite`(`ID`),
FOREIGN KEY(`Image_ID`) REFERENCES `Image`(`ID`),
PRIMARY KEY(`WebSite_ID`, `Image_ID`)
);

CREATE TABLE IF NOT EXISTS `Time`(
`ID` INT NOT NULL AUTO_INCREMENT,
`StartTime` DATETIME NOT NULL,
`EndTime` DATETIME NOT NULL,
`WebSite_ID` INT NOT NULL,
FOREIGN KEY(`WebSite_ID`) REFERENCES `WebSite`(`ID`),
PRIMARY KEY(`ID`)
);

CREATE TABLE IF NOT EXISTS `Text`(
`ID` INT NOT NULL AUTO_INCREMENT,
`Text` VARCHAR(255) NOT NULL,
`WebSite_ID` INT NOT NULL,
FOREIGN KEY(`WebSite_ID`) REFERENCES `WebSite`(`ID`),
PRIMARY KEY(`ID`)
);

CREATE TABLE IF NOT EXISTS `Table`(
`ID` INT NOT NULL AUTO_INCREMENT,
`WebSite_ID` INT NOT NULL,
FOREIGN KEY(`WebSite_ID`) REFERENCES `WebSite`(`ID`),
PRIMARY KEY(`ID`)
);

CREATE TABLE IF NOT EXISTS `Row`(
`ID` INT NOT NULL AUTO_INCREMENT,
`Table_ID` INT NOT NULL,
FOREIGN KEY(`Table_ID`) REFERENCES `Table`(`ID`) ON DELETE CASCADE,
PRIMARY KEY(`ID`)
);

CREATE TABLE IF NOT EXISTS `Column`(
`ID` INT NOT NULL AUTO_INCREMENT,
`Text` VARCHAR(255) NOT NULL,
`Row_ID` INT,
FOREIGN KEY(`Row_ID`) REFERENCES `Row`(`ID`) ON DELETE CASCADE,
PRIMARY KEY(`ID`)
);