####################### WARNING #######################
-- Fresh database script, 
-- only run if planning on cleaning to a new system...

/* Database Section
----------------------------------------------- */
-- Drop Database if it already exists.
DROP DATABASE IF EXISTS `Infoskaerm`;
-- Create New Database.
CREATE DATABASE `Infoskaerm`;
-- Choose the Database to use, and run the queries in.
USE `Infoskaerm`;

/* User Section
----------------------------------------------- */
/*
-- Drop User Account(s) if it exists.
DROP USER IF EXISTS 'developer'@'%';
DROP USER IF EXISTS 'production'@'Infoskaerm';

-- Create User Account(s) if it doesn't exists.
CREATE USER IF NOT EXISTS 'developer'@'%' 
				-- Select [auth_plugin], [auth_string]
				IDENTIFIED WITH mysql_native_password BY 'H.TYfw/[g;C/Uc+1Yp*FtK6og\fqVP/-'
				-- Select [password_option]
				PASSWORD EXPIRE NEVER;
-- Grant everything to specified user, on all databases, with optional grant option privilege. 
GRANT ALL PRIVILEGES ON *.* TO 'developer'@'%'WITH GRANT OPTION;

CREATE USER IF NOT EXISTS 'production'@'Infoskaerm'
				-- Select [auth_plugin], [auth_string]
				IDENTIFIED WITH mysql_native_password BY 'DxVUMZAcgj:2wPN2qfWDYb\/rw8b2mvI'
				-- Select [password_option]
				PASSWORD EXPIRE NEVER;
-- Grant options to specified user.
GRANT SELECT, INSERT, UPDATE, DELETE ON infoskaerm.* TO 'production'@'Infoskaerm';

/* Table Section
----------------------------------------------- */
--  Drop Tables if any of them exists.
DROP TABLE IF EXISTS `WebSite`, `Image`, `ImageLink`, `Text`, `Table`, `Row`, `Column`;

-- Create WebSite Table
CREATE TABLE `WebSite`(
`ID` INT NOT NULL AUTO_INCREMENT,
`Title` VARCHAR(40) NOT NULL,
`SiteID` TINYINT NOT NULL,
`Description` VARCHAR(255) NOT NULL,
`ActiveWebsite` BOOLEAN NOT NULL DEFAULT FALSE,
`IsTemplate` BOOLEAN NOT NULL DEFAULT FALSE,
-- Set Primary Key to [WebSite].ID.
PRIMARY KEY(`ID`)
);

-- Create Image Table
CREATE TABLE `Image`(
`ID` INT NOT NULL AUTO_INCREMENT,
`Path` VARCHAR(255) NOT NULL,
-- Set Primary Key to [Image].ID.
PRIMARY KEY(`ID`)
);

-- Create Table ImageLink
-- ImageLink is the table which connects the Image to the WebSite.
-- To avoid redundant data.
CREATE TABLE `ImageLink`(
`ID` INT NOT NULL AUTO_INCREMENT,
`WebSite_ID` INT NOT NULL,
`Image_ID` INT NOT NULL,
`Image_Style` MEDIUMTEXT NOT NULL,
-- Add Foreign Key between [ImageLink].WebSite_ID with [WebSite].ID.
FOREIGN KEY(`WebSite_ID`) REFERENCES `WebSite`(`ID`),
-- Add Foreign Key between [ImageLink].Image_ID with [Image].ID.
FOREIGN KEY(`Image_ID`) REFERENCES `Image`(`ID`),
-- Set Primary Key to [ImageLink].ID.
PRIMARY KEY(`ID`)
);

-- Create Text Table
-- Text is a paragraph just like <p> in HTML.
CREATE TABLE `Text`(
`ID` INT NOT NULL AUTO_INCREMENT,
`Text` MEDIUMTEXT NOT NULL,
`WebSite_ID` INT NOT NULL,
`Style` MEDIUMTEXT,
-- Add Foreign Key between [Text].WebSite_ID with [WebSite].ID.
FOREIGN KEY(`WebSite_ID`) REFERENCES `WebSite`(`ID`),
-- Set Primary Key to [Text].ID.
PRIMARY KEY(`ID`)
);

-- Create Table Table
-- Table is a Table just like <table> in HTML.
CREATE TABLE `Table`(
`ID` INT NOT NULL AUTO_INCREMENT,
`WebSite_ID` INT NOT NULL,
`Style` MEDIUMTEXT,
-- Add Foreign Key between [Table].WebSite_ID with [WebSite].ID.
FOREIGN KEY(`WebSite_ID`) REFERENCES `WebSite`(`ID`),
-- Set Primary Key to [Table].ID.
PRIMARY KEY(`ID`)
);

-- Create Table Row
-- Row table is the row inside the <table> in HTML.
CREATE TABLE `Row`(
`ID` INT NOT NULL AUTO_INCREMENT,
`Table_ID` INT NOT NULL,
`style` MEDIUMTEXT,
-- Add Foreign Key between [Row].Table_ID with [Table].ID.
FOREIGN KEY(`Table_ID`) REFERENCES `Table`(`ID`) ON DELETE CASCADE,
-- Set Primary Key to [Row].ID.
PRIMARY KEY(`ID`)
);

-- Create Table Column
-- Column table is the columns inside a row, which is inside the <table> in HTML.
CREATE TABLE `Column`(
`ID` INT NOT NULL AUTO_INCREMENT,
`Text` MEDIUMTEXT NOT NULL,
`Row_ID` INT NOT NULL,
`style` MEDIUMTEXT,
-- Add Foreign Key between [Column].Row_ID with [Row].ID.
FOREIGN KEY(`Row_ID`) REFERENCES `Row`(`ID`) ON DELETE CASCADE,
-- Set Primary Key to [Column].ID.
PRIMARY KEY(`ID`)
);