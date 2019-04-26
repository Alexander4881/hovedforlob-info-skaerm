CREATE DATABASE `infoskaerm`;

USE `infoskaerm`;

CREATE TABLE IF NOT EXISTS `WebSite`(
`ID` INT NOT NULL AUTO_INCREMENT,
`Title` VARCHAR(40) NOT NULL,
`SiteID` TINYINT NOT NULL,
`ActiveWebsite` BOOLEAN NOT NULL DEFAULT FALSE,
PRIMARY KEY(`ID`)
);

CREATE TABLE IF NOT EXISTS `Image`(
`ID` INT NOT NULL AUTO_INCREMENT,
`Path` VARCHAR(255) NOT NULL,
PRIMARY KEY(`ID`)
);

CREATE TABLE IF NOT EXISTS `ImageLink`(
`ID` INT NOT NULL AUTO_INCREMENT,
`WebSite_ID` INT NOT NULL,
`Image_ID` INT NOT NULL,
`Image_Style` MEDIUMTEXT NOT NULL,
FOREIGN KEY(`WebSite_ID`) REFERENCES `WebSite`(`ID`),
FOREIGN KEY(`Image_ID`) REFERENCES `Image`(`ID`),
PRIMARY KEY(`ID`)
);

CREATE TABLE IF NOT EXISTS `Text`(
`ID` INT NOT NULL AUTO_INCREMENT,
`Text` VARCHAR(255) NOT NULL,
`WebSite_ID` INT NOT NULL,
`Style` MEDIUMTEXT,
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
`style` MEDIUMTEXT,
FOREIGN KEY(`Table_ID`) REFERENCES `Table`(`ID`) ON DELETE CASCADE,
PRIMARY KEY(`ID`)
);

CREATE TABLE IF NOT EXISTS `Column`(
`ID` INT NOT NULL AUTO_INCREMENT,
`Text` VARCHAR(255) NOT NULL,
`Row_ID` INT,
`style` MEDIUMTEXT,
FOREIGN KEY(`Row_ID`) REFERENCES `Row`(`ID`) ON DELETE CASCADE,
PRIMARY KEY(`ID`)
);